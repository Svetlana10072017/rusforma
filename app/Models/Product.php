<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model

{

    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image', 'hit', 'new', 'recommend'];


    public function images()
    {
     //используем функцию hasMany
     //hasMany - Отношение «один-ко-многим» используется для определения отношений, в которых одна модель является родительской для одной или нескольких дочерних моделей
       return $this->hasMany(Image::class);

    }

    public function category()
    {
            //поскольку каждый продукт имеет свою категорию, мы прописываем belogsTo и укузываем модель Category, ставим class для добавления всего класса, содержащего все простраснтва имен
            //это  обратная связь Один к одному
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount(){
        if (!is_null($this->pivot)){ //если не нулевое кол-во товар
            //

            return $this->pivot->count*$this->price;//умножаем кол-во товара на цену товара
        }

        return $this->price;//возращаем цену товара
    }
    public function getCount(){
        if (!is_null($this->pivot)){ //если не нулевое кол-во товар
            //

            return $this->pivot->count;//умножаем кол-во товара на цену товара
        }

        return $this->count;//возращаем цену товара
    }

    public function setNewAttribute($value)
    {  //массив атрибут в поле нью присваиваем занчение, если значение оn, то присваиваем 0, иначе 1
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    public function setHitAttribute($value)
    {
         //массив атрибут в поле хит присваиваем занчение, если значение оn, то присваиваем 0, иначе 1

        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    public function setRecommendAttribute($value)
    {
    //массив атрибут в поле рекомменд присваиваем занчение, если значение оn, то присваиваем 0, иначе 1

        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
    }

}


// public function getCategory(){

    //     return Category::find($this->category_id);

    // }
    // public function category()
    // {

    //     return $this->belongsTo(Product::class);
    // }


