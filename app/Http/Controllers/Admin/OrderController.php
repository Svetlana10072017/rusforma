<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {     $orders=Order::where('status',1)->paginate(10);//показываем только отправленные заказы,
        // используем where и занчение status 1 для вывода
        return view('auth.orders.index', compact('orders'));//возращает страницу заказов
    }
    //отображение самого заказа в админке
    public function show(Order $order)
    {
        return view('auth.orders.show', compact('order'));
    }
}
