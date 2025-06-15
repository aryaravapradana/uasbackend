<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;

class SubCategoryController extends Controller
{
    public function show($slug)
    {
        $sub = SubCategory::where('slug', $slug)->firstOrFail();

        // Ambil produk yang punya subkategori ini
        $products = Product::where('subcategory_id', $sub->id)->paginate(12);

        session(['from_homepage' => true]);

        return view('products.by_subcategory', [
            'subcategory' => $sub,
            'products' => $products
        ]);
    }
    
}

