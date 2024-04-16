<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {//отображение заказов успешно сформированных

        $USER_ID = Auth::user()->id;

        // Вариант 1
        $orders = Order::where('user_id', $USER_ID)->where('status', 1)->get();

    // $orders = Auth::user()->orders()->where('status', 1)->get();
        //из-за глюка самого вижуал код студио,
        //он сам не видет метод ордерс
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {      //если не содержит такой заказа
        if (!Auth::user()->orders->contains($order)) {
            return to_route('person.orders.index');
        }

        return view('auth.orders.show', compact('order'));
    }
}

