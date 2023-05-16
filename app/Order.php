<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function order_products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);

    }
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}

