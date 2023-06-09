<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
    protected $primaryKey = 'id';
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
