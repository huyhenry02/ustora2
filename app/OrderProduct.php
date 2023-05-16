<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
