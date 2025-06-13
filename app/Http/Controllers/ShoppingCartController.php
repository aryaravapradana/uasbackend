<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product; // Pastikan Product diimpor
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $cartItems = ShoppingCart::where('user_id', Auth::id())->with('product')->get();

        $totalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * ($item->product->price ?? 0);
        });

        return view('cart.index', compact('cartItems', 'totalAmount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $quantity = $request->input('quantity', 1);

        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            ShoppingCart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        $cartItem = ShoppingCart::findOrFail($id);

        if ($cartItem->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = ShoppingCart::where('id', $id)
                                 ->where('user_id', Auth::id())
                                 ->with('product')
                                 ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Item keranjang tidak ditemukan atau tidak diizinkan.'], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $pricePerUnit = $cartItem->product->price ?? 0;
        $newItemTotal = $pricePerUnit * $cartItem->quantity;

        $allCartItems = ShoppingCart::where('user_id', Auth::id())->with('product')->get();
        $overallTotalAmount = $allCartItems->sum(function($item) {
            return $item->quantity * ($item->product->price ?? 0);
        });

        return response()->json([
            'success' => true,
            'message' => 'Kuantitas berhasil diperbarui.',
            'newQuantity' => $cartItem->quantity,
            'pricePerUnit' => $pricePerUnit, // Mengembalikan harga per unit produk
            'newItemTotal' => number_format($newItemTotal, 0, ',', '.'), // Total harga item ini yang baru
            'overallTotalAmount' => number_format($overallTotalAmount, 0, ',', '.') // Total keseluruhan keranjang
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20', // Input 'phone' dari form
            'selected_items_id' => 'required|string', // String CSV dari ID item keranjang
            'notes' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $selectedCartItemIds = explode(',', $request->input('selected_items_id'));
        $selectedCartItemIds = array_filter($selectedCartItemIds); // Menghapus ID kosong jika ada

        if (empty($selectedCartItemIds)) {
            return redirect()->back()->with('error', 'Pilih setidaknya satu item untuk melanjutkan pembayaran.');
        }

        DB::beginTransaction();
        try {
            // Ambil item keranjang yang dipilih oleh pengguna
            $cartItems = ShoppingCart::whereIn('id', $selectedCartItemIds)
                                     ->where('user_id', $user->id)
                                     ->with('product')
                                     ->get();

            if ($cartItems->isEmpty()) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Item yang dipilih tidak ditemukan di keranjang Anda.');
            }

            $totalAmount = 0;
            $orderItemsData = [];

            foreach ($cartItems as $item) {
                if ($item->product) {
                    $itemPrice = $item->product->price;
                    $subtotal = $item->quantity * $itemPrice;
                    $totalAmount += $subtotal;

                    $orderItemsData[] = new OrderItem([
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $itemPrice,
                    ]);
                } else {
                    DB::rollBack();
                    return redirect()->route('cart.index')->with('error', 'Salah satu produk di keranjang tidak valid atau tidak ditemukan.');
                }
            }

            // Buat Order baru
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'address' => $request->address,
                'shipping_address' => $request->address, // Mengisi kolom 'shipping_address'
                'phone' => $request->phone, // Mengisi kolom 'phone' dari request
                'notes' => $request->notes,
                'order_date' => now(),
                // Pastikan kolom-kolom ini ada di tabel 'orders' dan fillable di model Order
                'billing_address' => $request->address, // Asumsi billing_address juga sama dengan alamat
                'payment_method' => 'default', // Atur default jika tidak ada input dari form
                'payment_status' => 'pending', // Atur default jika tidak ada input dari form
            ]);

            $order->items()->saveMany($orderItemsData);

            // Hapus item dari keranjang yang sudah di-checkout
            ShoppingCart::whereIn('id', $selectedCartItemIds)
                        ->where('user_id', $user->id)
                        ->delete();

            // Memanggil PaymentController (asumsi ada dan berfungsi)
            $paymentController = app(\App\Http\Controllers\PaymentController::class);
            $paymentResponse = $paymentController->initiatePayment(
                Request::create('/api/payments/initiate', 'POST', [
                    'order_id' => $order->id,
                    'amount' => $totalAmount,
                    'user_id' => $user->id,
                ])
            );

            $paymentData = $paymentResponse->getData();

            if ($paymentResponse->getStatusCode() === 200 && $paymentData->status === 'paid') {
                DB::commit();
                return redirect()->route('order.success', $order->id)->with('success', 'Checkout berhasil! Pembayaran sukses.');
            } else if ($paymentResponse->getStatusCode() === 200 && $paymentData->status === 'failed') {
                DB::commit();
                return redirect()->route('order.failed', $order->id)->with('error', 'Checkout berhasil, namun pembayaran gagal. Silakan coba lagi.');
            } else {
                DB::rollBack();
                Log::error('Payment initiation failed after order creation.', [
                    'order_id' => $order->id,
                    'payment_response' => $paymentData,
                    'http_status' => $paymentResponse->getStatusCode(),
                ]);
                return redirect()->route('cart.index')->with('error', 'Gagal memproses pembayaran. Silakan coba lagi nanti.');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error during checkout process: ' . $e->getMessage(), [
                'user_id' => $user->id ?? 'guest',
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }
}