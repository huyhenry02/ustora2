<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    protected $table = 'vendors';
    protected $primaryKey = 'id';
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'brand_vendor');
    }


}
