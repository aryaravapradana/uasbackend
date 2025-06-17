@extends('layouts.app')

@section('content')
<main style="max-width: 1200px; margin: auto; padding: 2rem;">
    <a href="{{ session('from_homepage') ? route('home') : url()->previous() }}"
       onclick="{{ session()->forget('from_homepage') }}" 
       style="display: inline-flex; align-items: center; gap: 8px; margin-bottom: 1.5rem; padding: 0.6rem 1.2rem; background-color: #f9fafb; color: #1f2937; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; font-weight: 500; text-decoration: none; box-shadow: 0 2px 5px rgba(0,0,0,0.05); transition: all 0.3s ease;"
       onmouseover="this.style.backgroundColor='#e5e7eb'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'"
       onmouseout="this.style.backgroundColor='#f9fafb'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.05)'">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
           <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H3.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 1 1 .708.708L3.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
       </svg>
       Kembali
    </a>

    <h2 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
        {{ $subcategory->name }}
    </h2>
    <form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="query" placeholder="Mau Cari {{ strtolower($subcategory->name) }} Yang apa?"
           style="padding: 0.5rem 1rem; border: 1px solid #d1d5db; border-radius: 6px; width: 300px;">
    
    <input type="hidden" name="subcategory" value="{{ $subcategory->slug }}">

    <button type="submit"
            style="padding: 0.5rem 1rem; background-color:rgb(3, 172, 14); color: white; border: none; border-radius: 6px; margin-left: 0.5rem;">
        Cari
    </button>
</form>


    @if ($products->count())
        <div class="product-grid">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="product-card">
                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <p class="meta">
                                {{ $product->subcategory->category->name ?? '-' }} / {{ $product->subcategory->name }}
                            </p>
                            <p class="stock">
                                Stok: {{ $product->stock }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="pagination-container">
    <div>
        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results
    </div>

    <ul class="pagination">
        {{-- Prev --}}
        @if ($products->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
        @endif

        {{-- Page number --}}
        @for ($i = 1; $i <= $products->lastPage(); $i++)
            <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        {{-- Next --}}
        @if ($products->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        @endif
        <link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
    </ul>
</div>
    @else
        <div style="padding: 2rem; background: #f3f4f6; text-align: center; border-radius: 8px;">
            Tidak ada produk untuk subkategori ini.
        </div>
    @endif
</main>
@endsection
