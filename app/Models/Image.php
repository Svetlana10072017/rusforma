<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['product_id','image'];
    public function product()
    {
            //поскольку каждый продукт имеет свою категорию, мы прописываем belogsTo и укузываем модель Category, ставим class для добавления всего класса, содержащего все простраснтва имен
            //это  обратная связь Один к одному
        return $this->belongsTo(Product::class);
    }

}

