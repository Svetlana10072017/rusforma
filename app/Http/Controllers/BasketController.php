<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;








    class BasketController extends Controller
{

    //открытие корзины
    public function basket(){

        $categories1=Category::get();
         $orderId=session('orderId');


        //если корзина пустая, то создаем через create заказ, используя модель Order, если нет, то ищем заказ по id
        if(is_null($orderId)){
            $order=Order::create();
        }else{
            $order=Order::find($orderId);
        }
        $ordercount=$order->calculateOrdersCount();






    session()->put('ordercount', $ordercount);

        return view('basket', compact('order', 'categories1'));
    }

    public function basketConfirm(Request $request)
    { $orderId=session('orderId');
        if(is_null($orderId)){//если в корзине нет товара редирект на главную

        return to_route('index');

    }
    $order=Order::find($orderId);//ищем заказ
    if(!Auth::check()){
    session()->flash('warning', 'Для продолжения войдите или зарегистрируйтесь');

    return to_route('login');


     }
       if($request->name!=Auth::user()->name || $request->email!=Auth::user()->email){
        session()->flash('warning', 'Неверное  имя пользователя!');
        return to_route('basket-place');

       }
       else{
       $success=$order->saveOrder($request->name, $request->phone, $request->user_id, $request->email,$request->message);

       //если успешно найден заказ берем данные из запроса по  телефону и имени
       if($success){
        session()->flash('success', 'Поздравляем  вас c заказом');//если успешно то с помощью сессии и флеш передаем сообщение о успешном завершении
       }else{

        session()->flash('warning', 'Error');
       }
       session()->forget('ordercount');
        return to_route('index');//после отправки заказа возращаемся на главную
    }
    }

    public function basketPlace(){
        $categories1=Category::get();
        $orderId=session('orderId');
        if(is_null($orderId)){//если в корзине нет товара редирект на главную
          return to_route('index');



        }
          $order=Order::find($orderId);//иначе ищем заказ

        return view('order', compact('order','categories1'));//переходим на страницу заказа
    }

    public function basketAdd($productId){
         //если корзина пустая, то создаем через create заказ, используя модель Order, если нет, то ищем заказ по id
        $orderId=session('orderId');
        if (is_null($orderId)){
            $order=Order::create();
            session(['orderId'=>$order->id]);

          }else{

            $order=Order::find($orderId);
          }
          //Метод contains() проверяет, существует ли в текущей коллекции заданное значение.
    // В этом случае, метод contains() возвращает true или false.
          if($order->products->contains($productId)){

            $pivotRow=$order->products()->where('product_id',$productId)->first()->pivot;//ищем первый продукт
            //$pivotRow->count++;//кол-во товара увеличивается на 1
            $pivotRow->update();//кол-во товара обнавляется

             }
          else{
            //кладем заказ в корзину через attach
            $order->products()->attach($productId);
          }





          $product=Product::find($productId);
          $prodinfo=Product::find($productId);
        session()->flash('success','В корзину добавлен товар:'.$product->name);

          return to_route('basket', compact('prodinfo'));//редирект на страницу корзины


 }
 public function basketRemove($productId)
 { //orderId нужен для понимания, с каким товаром мы работаем
    $orderId=session('orderId');
    if(is_null($orderId)){
        //если в корзине нет товара, то редиректим на корзину
        return to_route('basket');
    }
    $order=Order::find($orderId);



    //Метод contains() проверяет, существует ли в текущей коллекции заданное значение.
    // В этом случае, метод contains() возвращает true или false.
    if($order->products->contains($productId)){

           //нам нужно сделать sql запрос, для увеличения кол-ва(counts) прдукта в корзине
        $pivotRow=$order->products()->where('product_id',$productId)->first()->pivot;//ищем первый продукт
         if($pivotRow->count<2){ //если кол-во товара в корзине меньше 2
            $order->products()->detach($productId); //при удалении товара заказ удаляется

         }

        else{

            $pivotRow->count--;//кол-во товара уменьшается на 1
            $pivotRow->update();//кол-во товара обнавляется


            }
    }
        $product=Product::find($productId);
        session()->flash('warning','Из корзины был удален товар:'.$product->name);//используем ссессию и флэш добавляем параметр product name для оповещения об удалении товара
        return to_route('basket');
 }



//  public function basketCount($productId){
//    $orderId=session('orderId');   if (is_null($orderId)){
//        $order=Order::create();
//        session(['orderId'=>$order->id]);

//      }else{

//        $order=Order::find($orderId);
//      }
//      $ordercount=$order->calculateOrdersCount();

//      $product=Product::find($productId);
//    session()->flash('success',$ordercount);

//      return to_route('basket');//редирект на страницу корзины


// }


}
