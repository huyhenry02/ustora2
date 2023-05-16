<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public function products() {
        return $this->hasMany(Product::class,'category_id');
    }
    public function getProductsWithLowerStock()
    {
        return $this->products()->where('stock', '<', 5)->get();
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'brand_category');
    }
}
