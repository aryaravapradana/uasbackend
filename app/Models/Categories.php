<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories'; // wajib karena nama model plural
    protected $fillable = ['name', 'slug'];

    public function subcategories()
    {
        return $this->hasMany(SubCategories::class, 'category_id');
    }
}

