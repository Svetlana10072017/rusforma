<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $orderId=session('orderId');
        if(!is_null($orderId)){//если не нулл
            $order=Order::findOrFail($orderId);//выдает по id оредер ничего не будет найдено
            if($order->products->count() > 0) {//если больше 0 новый запрос

                return $next($request);
            }


        }

        session()->forget('ordercount');
        session()->flash('warning', 'Пустая корзина!');//выдает оповещение о пустой корзине
        return to_route('index');



    }
}
