@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Produk dalam Subkategori: {{ $subcategory->name }}</h2>

    @if ($products->count())
        <div class="grid grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="border p-3 rounded">
                    <h3 class="font-semibold">{{ $product->name }}</h3>
                    <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @else
        <p>Tidak ada produk ini</p>
    @endif
@endsection
