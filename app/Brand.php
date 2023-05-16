<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';
    public function products()
{
    return $this->belongsToMany(Product::class,'brand_product');
}
    public function categoríes()
    {
        return $this->belongsToMany(Category::class, 'brand_category');
    }
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'brand_vendor');
    }


}
