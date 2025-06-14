<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Import class Auth

class ProductController extends Controller
{
    /**
     * Menampilkan halaman daftar semua produk (untuk user biasa atau admin).
     * Ini menggantikan getProducts() dan productsUser().
     */
   public function index()
    {
        $products = Product::latest()->paginate(4);
        $categories = Category::with('subcategories')->get();

        return view('products.index', compact('products', 'categories'));
    }


    /**
     * Menampilkan halaman form untuk membuat produk baru.
     * Menggantikan createProduct().
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru yang dikirim dari form.
     * Ini menggantikan newProduct().
     */
    public function store(Request $request)
    {
        // 1. Validasi input. Nama input di form HARUS 'name', 'description', dll.
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            // 'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'] // Contoh jika ada upload gambar
        ]);

        // 2. [AMAN] Mengambil Shop ID milik user yang sedang login.
        $shop = Shop::where('owner_id', auth()->id())->first();

        // Jika user tidak punya toko, gagalkan.
        if (!$shop) {
            return redirect()->back()->with('error', 'Anda harus memiliki toko untuk menambahkan produk.');
        }

        // 3. Menambahkan shop_id ke data yang sudah divalidasi.
        $validatedData['shop_id'] = $shop->id;

        // 4. Membuat produk baru di database.
        Product::create($validatedData);
    
        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan!'); // Redirect ke homepage
    }
    
    /**
     * Menampilkan halaman detail satu produk.
     * Menggantikan getProduct().
     */
    public function show(Product $product) // <-- Menggunakan Route Model Binding
    {
            if (!session()->has('prev_category_url')) {
            $referer = url()->previous();
            if (str_contains($referer, '/kategori/')) {
                session(['prev_category_url' => $referer]);
            }
        }
    
        return view('products.show', compact('product'));
    }

    /**
     * Menampilkan halaman form untuk mengedit produk.
     * Menggantikan editProduct() dan adminEditProduct().
     */
    public function edit(Product $product) // <-- Menggunakan Route Model Binding
    {
        // Di aplikasi nyata, kamu bisa menambahkan otorisasi di sini
        // cth: if (auth()->user()->cannot('update', $product)) { abort(403); }

        return view('products.edit', ['product' => $product]);
    }

    /**
     * Mengupdate data produk di database.
     */
    public function update(Request $request, Product $product) // <-- Menggunakan Route Model Binding
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        // Update produk
        $product->update($validatedData);

        return redirect()->route('home')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari database.
     * Menggantikan deleteProduct().
     */
    public function destroy(Product $product) // <-- Menggunakan Route Model Binding
    {
        // Di aplikasi nyata, kamu bisa menambahkan otorisasi di sini
        $product->delete();

        return redirect()->route('home')->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Mencari produk berdasarkan nama.
     * Menggantikan searchProduct().
     */
    
  public function search(Request $request)
    {
        $query = $request->input('q');
        $products = \App\Models\Product::where('name', 'like', '%' . $query . '%')
                                   ->orWhere('description', 'like', '%' . $query . '%')
                                   ->get();

        if ($products->isEmpty()) {
            abort(404);
        }

        return view('products.search', compact('products', 'query'));
    }
}