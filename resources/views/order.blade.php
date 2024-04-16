@extends('layouts.master')
@section('title', 'Все моды')
@section('content')
<h3>Оформление заказа</h3>
<div>Для оформление заказа необходимо <a class="link-pr" href="{{route('login')}}">войти или зарегистрироваться</a></div>
<br>
            <h6>Детали заказа</h6>
            <div>
                Количество позиций:
                {{$order->calculateOrdersCount()}}
            </div>

              <h5>Общая сумма: {{$order->calculateOrders()}} &#8381</h5>
              <hr>
              <form  class="align-items-center" action="{{route('basket-confirm')}}" method="POST">
                <div class="row-mb-3">
                  <label class="col-sm-2 col-form-label" for="name">Имя</label>
                  <div class="col-sm-8">
                  <input type="text" name="name"  class="form-control border border-secondary" id="name" placeholder="Jane Doe">
                    </div>
                </div>
                <div class="row-mb-3">
                    <label class="col-sm-2 col-form-label" for="email">E-mail</label>
                    <div class="col-sm-8">
                    <input type="email"  name="email" class="form-control border border-secondary" id="email" placeholder="Jane@Doe">
                </div>
                  </div>
                  <div class="row-mb-3">
                    <label class="col-sm-2 col-form-label" for="phone">Телефон</label>
                    <div class="col-sm-8">
                    <input type="text"  name="phone" class="form-control border border-secondary phone" id="phone" placeholder="">
                </div>
                  </div>
                  <div class="row-mb-3">

                    {{-- <label class="col-sm-2 col-form-label" for="phone">Телефон</label> --}}
                    {{-- <div class="col-sm-8">
                    <input type="hidden"  name="user_id" class="form-control border border-secondary">
                    </div> --}}

                  </div>
                <div class="row-mb-3">
                    <label class="col-sm-2 col-form-label" for="message">Комментарий к заказу</label>
                    <div class="col-sm-8">
                    <textarea name="message"  class="form-control border border-secondary" cols="40" rows="8" id="message"></textarea>
                </div>
                  </div>
                  {{-- @auth --}}





                  {{-- @if(Auth::user()->id) --}}
                <div class="row-mb-3">
                <br>

                  <input type="submit" class="btn btn-basket" href="{{route('basket-confirm')}}" value="Оформить заказ">
                </div>
                {{-- @endauth --}}




                @csrf
              </form>
               {{-- @else
              <div class="row-mb-3">
                    <br>

                      <a class="btn btn-basket" href="{{route('login')}}">Оформить заказ</a>
                    </div>
             @endif --}}













@endsection
