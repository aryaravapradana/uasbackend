<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id', // Foreign key untuk toko yang menjual produk ini
        'name',
        'description',
        'price',
        'stock',
        // Tambahkan kolom lain sesuai kebutuhan, misal:
        // 'sku',
        // 'category_id',
        // 'image_path',
        // 'weight',
    ];

    protected $casts = [
        'price' => 'decimal:2', // Contoh cast harga ke desimal
    ];

    /**
     * Relasi ke Toko.
     * Satu produk dimiliki oleh satu toko.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * Relasi ke Keranjang Belanja (Many-to-Many).
     * Produk bisa ada di banyak keranjang belanja, dan keranjang bisa punya banyak produk.
     * Ini biasanya melalui tabel pivot 'cart_product' atau 'shopping_cart_items'.
     */
    public function shoppingCarts(): BelongsToMany
    {
        // Asumsi ada tabel pivot 'cart_product' dengan 'shopping_cart_id' dan 'product_id'
        // Kamu mungkin perlu membuat model CartItem untuk detail seperti quantity.
        return $this->belongsToMany(ShoppingCart::class, 'cart_product')
                    ->withPivot('quantity', 'price') // Contoh jika ada detail di pivot
                    ->withTimestamps();
    }

    /**
     * Relasi ke Pesanan (Many-to-Many).
     * Produk bisa ada di banyak pesanan, dan pesanan bisa punya banyak produk.
     * Ini biasanya melalui tabel pivot 'order_product' atau 'order_items'.
     */
    public function orders(): BelongsToMany
    {
        // Asumsi ada tabel pivot 'order_product' dengan 'order_id' dan 'product_id'
        // Kamu mungkin perlu membuat model OrderItem untuk detail seperti quantity dan harga saat itu.
        return $this->belongsToMany(Order::class, 'order_product')
                    ->withPivot('quantity', 'price') // Contoh jika ada detail di pivot
                    ->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

   public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}