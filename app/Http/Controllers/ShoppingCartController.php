<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;
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
            return response()->json(['message' => 'Item keranjang tidak ditemukan atau tidak diizinkan.'], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $cartItems = ShoppingCart::where('user_id', Auth::id())->with('product')->get();
        $newTotalAmount = $cartItems->sum(function ($item) {
            return $item->quantity * ($item->product->price ?? 0);
        });

        return response()->json([
            'message' => 'Kuantitas berhasil diperbarui.',
            'new_quantity' => $cartItem->quantity,
            'new_item_total' => number_format($cartItem->quantity * ($cartItem->product->price ?? 0), 0, ',', '.'),
            'overall_total_amount' => number_format($newTotalAmount, 0, ',', '.')
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $cartItems = ShoppingCart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong.');
        }

        DB::beginTransaction();
        try {
            $totalAmount = 0;
            $orderItemsData = [];

            foreach ($cartItems as $item) {
                if ($item->product) {
                    $itemPrice = $item->product->price;
                    $subtotal = $item->quantity * $itemPrice;
                    $totalAmount += $subtotal;

                    $orderItemsData[] = new \App\Models\OrderItem([
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $itemPrice,
                    ]);
                } else {
                    DB::rollBack();
                    return redirect()->route('cart.index')->with('error', 'Salah satu produk di keranjang tidak valid.');
                }
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalAmount,
                'status' => 'unpaid',
                'address' => $request->address,
                'phone' => $request->phone,
                'notes' => $request->input('notes'),
                'order_date' => now(),
            ]);

            $order->items()->saveMany($orderItemsData);

            ShoppingCart::where('user_id', $user->id)->delete();

            $paymentRequest = Request::create('/api/payments/initiate', 'POST', [
                'order_id' => $order->id,
                'amount' => $totalAmount,
            ]);

            $paymentController = new \App\Http\Controllers\PaymentController();
            $paymentResponse = $paymentController->initiatePayment($paymentRequest);

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
                'user_id' => $user->id,
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat checkout. Silakan coba lagi.');
        }
    }
}