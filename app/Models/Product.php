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

    ];

    protected $casts = [
        'price' => 'decimal:2', 
    ];


    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }


    public function shoppingCarts(): BelongsToMany
    {

        return $this->belongsToMany(ShoppingCart::class, 'cart_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    public function orders(): BelongsToMany
    {

        return $this->belongsToMany(Order::class, 'order_product')
                    ->withPivot('quantity', 'price')
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