<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Foreign key untuk pengguna yang melakukan pesanan
        'total_amount',
        'status', // Misal: pending, processing, shipped, completed, cancelled
        'shipping_address',
        'billing_address',
        'payment_method',
        'payment_status',
        // Tambahkan kolom lain sesuai kebutuhan
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    /**
     * Relasi ke Pengguna.
     * Satu pesanan dimiliki oleh satu pengguna.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Produk (Many-to-Many).
     * Satu pesanan bisa terdiri dari banyak produk.
     * Ini biasanya melalui tabel pivot 'order_product' atau 'order_items'.
     */
    public function products(): BelongsToMany
    {
        // Asumsi ada tabel pivot 'order_product' dengan 'order_id' dan 'product_id'
        // Kamu mungkin perlu membuat model OrderItem untuk detail seperti quantity dan harga saat itu.
        return $this->belongsToMany(Product::class, 'order_product')
                    ->withPivot('quantity', 'price') // Contoh jika ada detail di pivot (harga saat order)
                    ->withTimestamps();
    }
}