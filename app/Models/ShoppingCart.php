<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Foreign key untuk pengguna pemilik keranjang
        // Tambahkan kolom lain sesuai kebutuhan, misal:
        // 'session_id', // Untuk guest cart
        // 'status', // Misal: active, abandoned
    ];

    /**
     * Relasi ke Pengguna.
     * Satu keranjang belanja dimiliki oleh satu pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Produk (Many-to-Many).
     * Keranjang belanja bisa memiliki banyak produk.
     * Ini biasanya melalui tabel pivot 'cart_product' atau 'shopping_cart_items'.
     */
    public function products(): BelongsToMany
    {
        // Asumsi ada tabel pivot 'cart_product' dengan 'shopping_cart_id' dan 'product_id'
        // Kamu mungkin perlu membuat model CartItem untuk detail seperti quantity.
        return $this->belongsToMany(Product::class, 'cart_product')
                    ->withPivot('quantity', 'price') // Contoh jika ada detail di pivot
                    ->withTimestamps();
    }
}