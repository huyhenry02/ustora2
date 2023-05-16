<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public function users() {
        return $this->hasMany(User::class,'role_id');
    }
    public function articles() {
        return $this->hasMany(Article::class,'role_id');
    }
}
