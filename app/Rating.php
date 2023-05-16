<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
