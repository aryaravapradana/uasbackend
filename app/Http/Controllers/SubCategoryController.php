<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategories;
use App\Models\Product;

class SubCategoryController extends Controller
{
    public function show($slug)
    {
        $sub = SubCategories::where('slug', $slug)->firstOrFail();

        // Ambil produk yang punya subkategori ini
        $products = Product::where('subcategory_id', $sub->id)->paginate(12);

        return view('products.by_subcategory', [
            'subcategory' => $sub,
            'products' => $products
        ]);
    }
}

