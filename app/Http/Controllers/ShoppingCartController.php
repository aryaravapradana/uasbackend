<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        // Ambil cart berdasarkan user_id
        $cartItems = ShoppingCart::where('user_id', Auth::id())->with('product')->get();

        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        // ✅ Validasi bahwa product_id dikirim dan ada di tabel products
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Cek apakah produk sudah ada di keranjang
        $cartItem = ShoppingCart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            // Kalau sudah ada, tambahkan quantity
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Kalau belum ada, buat data baru
            ShoppingCart::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function destroy($id)
    {
        $cartItem = ShoppingCart::findOrFail($id);

        // ❗ Pastikan user yang login adalah pemilik item ini
        if ($cartItem->user_id !== Auth::id()) {
            abort(403); // Forbidden access
        }

        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
