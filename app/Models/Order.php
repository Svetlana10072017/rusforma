<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Order extends Model

{
    protected $fillable = ['calculateOrdersCount()'];
        //для оформления заказов на нужны продукты. создаем метод продукты
    //используем belongsToMany для связи многие ко многим  через pivot table/до этого создаем таблицу промежуточную ордер продактс
    public function products()
    {
    return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    //добавляем из таблицы order_products графу count для связки при помощи withPivot

    }
    //общая стоимость заказа
    public function calculateOrders()
    {
        $sum=0;//изначально сумма равна
        foreach($this->products as $product)
        {
            //проходимся по всем товарам
            //суммируем стоимость товаров( с учетом их кол-ва в корзине)

            $sum+=$product->getPriceForCount();
        }
        return $sum;//возращаем сумму
    }

    public function calculateOrdersCount()
    {

        $count= 0;//изначально сумма равна
        foreach($this->products as $product)
        {
            //проходимся по всем товарам
            //суммируем стоимость товаров( с учетом их кол-ва в корзине)

            $count+=$product->getCount();
        }
        return $count;//возращаем сумму

    }

    //сохранение заказа, передаем имя и телефон
    public function saveOrder($name, $phone, $user_id, $email, $message){
        $user_id=Auth::user()->id;



   if ($this->status==0){//если статус заказа 0
       $this->name=$name;//сохранение имени
       $this->email=$email;
       $this->phone=$phone;
       $this->user_id=$user_id;

       $this->message=$message;
       $this->status=1;//статус заказа становиться 1
       $this->save();//сохранение заказа
       session()->forget('orderId');//сессия после этого по ключю orderId сессия обнавляется

       return true;} else{

        return false;
       }
    }

}
