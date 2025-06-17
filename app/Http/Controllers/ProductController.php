<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; 

class ProductController extends Controller
{

   public function index()
    {
        $recommended = Product::inRandomOrder()->take(25)->get();
        return view('products.index', compact('recommended'));
    }


    
    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            // 'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'] // Contoh jika ada upload gambar
        ]);

        
        $shop = Shop::where('owner_id', auth()->id())->first();

        
        if (!$shop) {
            return redirect()->back()->with('error', 'Anda harus memiliki toko untuk menambahkan produk.');
        }

        
        $validatedData['shop_id'] = $shop->id;


        Product::create($validatedData);
    
        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan!'); 
    }
    

    public function show(Product $product) 
    {
            if (!session()->has('prev_category_url')) {
            $referer = url()->previous();
            if (str_contains($referer, '/kategori/')) {
                session(['prev_category_url' => $referer]);
            }
        }
    
        return view('products.show', compact('product'));
    }


    public function edit(Product $product) 
    {

        return view('products.edit', ['product' => $product]);
    }


    public function update(Request $request, Product $product) 
    {
        
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        
        $product->update($validatedData);

        return redirect()->route('home')->with('success', 'Produk berhasil diperbarui!');
    }


    public function destroy(Product $product) 
    {
        
        $product->delete();

        return redirect()->route('home')->with('success', 'Produk berhasil dihapus!');
    }



public function search(Request $request)
{
    $query = $request->input('query');
    $subcategorySlug = $request->input('subcategory'); // pakai SLUG

    $normalizedQuery = Str::lower(trim(preg_replace('/\s+/', ' ', $query)));
    $keywords = explode(' ', $normalizedQuery);

    $products = Product::query();

    // ✅ FILTER BERDASARKAN SLUG SUBKATEGORI
    if (!empty($subcategorySlug)) {
        $products->whereHas('subcategory', function ($q) use ($subcategorySlug) {
            $q->where('slug', $subcategorySlug);
        });
    }

    // ✅ FILTER NAMA SESUAI KEYWORDS
    foreach ($keywords as $keyword) {
        $products->whereRaw('LOWER(name) LIKE ?', ["%{$keyword}%"]);
    }

    // ✅ OPSIONAL: tambahkan match deskripsi / subkategori name
    $products->orWhereRaw('LOWER(description) LIKE ?', ["%{$normalizedQuery}%"])
             ->orWhereHas('subcategory', function ($q) use ($normalizedQuery) {
                 $q->whereRaw('LOWER(name) LIKE ?', ["%{$normalizedQuery}%"]);
             });

    // ✅ SORTING: relevansi
    $products->orderByRaw("POSITION(? IN LOWER(name))", [$normalizedQuery]);

    $results = $products->get();

    if ($results->isEmpty()) {
        abort(404, 'Produk tidak ditemukan.');
    }

    return view('products.search', [
        'products' => $results,
        'query' => $query
    ]);
}




}