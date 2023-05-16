<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'brand_product');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id' );
    }

}
