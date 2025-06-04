<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        // Tambahkan kolom lain sesuai kebutuhan, misal:
        // 'username',
        // 'phone_number',
        // 'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke Toko (jika pengguna bisa memiliki toko).
     * Seorang pengguna bisa memiliki satu toko.
     */
    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    /**
     * Relasi ke Pesanan.
     * Seorang pengguna bisa memiliki banyak pesanan.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Relasi ke Keranjang Belanja.
     * Seorang pengguna memiliki satu keranjang belanja.
     */
    public function shoppingCart(): HasOne
    {
        return $this->hasOne(ShoppingCart::class);
    }
}