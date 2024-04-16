@extends('auth.layouts.master')

@section('title', 'Заказ ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-start">
                <div class="panel">
                    <h1>Заказ №{{ $order->id }}</h1>
                    <div>Заказчик: <b>{{ $order->name }}</b></div>
                    <div>E-mail: <b>{{ $order->email }}</b></div>
                    <div>Телефон: <b>{{ $order->phone }}</b></div>
                    <div> Комментарий к заказу:{{$order->message}}</div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Цена</th>
                            <th></th>
                            <th>Стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td class="img-mini">

                                        <img
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}

                                </td>

                                <td>{{ $product->price }} руб.</td>
                                <td></td>
                                <td>{{ $product->getPriceForCount()}} руб.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Общая стоимость:</td>
                            <td>{{ $order->calculateOrders() }} руб.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
