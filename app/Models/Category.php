<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['code','name','image'];

    public function products()
    {
     //используем функцию hasMany
     //hasMany - Отношение «один-ко-многим» используется для определения отношений, в которых одна модель является родительской для одной или нескольких дочерних моделей
       return $this->hasMany(Product::class);

    }
}
