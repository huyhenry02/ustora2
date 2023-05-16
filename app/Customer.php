<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Customer extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password','cart',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = 'customers';
    protected $primaryKey = 'id';
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
