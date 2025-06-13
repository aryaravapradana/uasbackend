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
     * ini relasi untuk si ke Keranjang Belanja.
     * nanti pas user memiliki satu keranjang belanja.
     */
    public function shoppingCart(): HasOne
    {
        return $this->hasOne(ShoppingCart::class);
    }

        /**
     * Mengambil inisial dari nama user.
     * Contoh: "Anjay Mabar" → "AM"
     */
    public function getInitialAttribute(): string
{
    $nama = explode(' ', $this->name);
    $inisial = '';

    foreach ($nama as $n) {
        $inisial .= strtoupper(substr($n, 0, 1));
    }

    return substr($inisial, 0, 2); // Ambil max 2 huruf aja
}


}
#