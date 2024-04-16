@extends('layouts.master')
@section('title', 'Все моды')
@section('content')

<h3>Корзина</h3>
@foreach ( $order->products as $product )
<div class="row row-basket">
    <div class="col-sm-3 align-content-sm-center">
      <a href="{{route('product',[$product->category->code, $product->code] )}}">
    <div class="img-mini"><img src="{{Storage::url($product->image)}}" alt="">
    </div>
    </a>
    </div>
    <div class="col-sm-3 align-content-sm-center">

        <div>
            {{$product->name}}

        </div>
      </div>

    <div class="col-sm-3 align-content-sm-center">

        <div>{{$product->price}} &#8381</div>



    </div>
    <div class="col-sm-3 align-content-sm-center">
        <form action="{{route('basket-remove', $product)}}" method="POST">

        <div>
            <button type="submit" class="btn  btn-sm"><img src="{{asset('images/udalit_yjcy701sz34w_32.png')}}" alt=""></button>
        </div>
        @csrf
        </form>


    </div>

</div>
@endforeach




  <br>

  <h5>Итого {{$order->calculateOrders()}}
     &#8381 <br> Количество позиций:<span class="exp">


     {{$order->calculateOrdersCount()}}
     </span>
    </h5>
  <hr>

    <br>
      <a href="{{route('basket-place')}}" class="btn btn-basket">Перейти к оформлению</a>

    @endsection
