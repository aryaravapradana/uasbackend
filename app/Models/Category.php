<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // wajib karena nama model plural
    protected $fillable = ['name', 'slug'];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

}

