@extends('auth.layouts.master')
@section('title', 'Заказы')
@section('content')
<div class="col-md-12">
    <h1>Заказы</h1>
    <table class="table">
        <tbody>

        <tr>
            <th>
                #
            </th>
            <th>
                Имя
            </th>
            <th>
                e-mail
            </th>
            <th>
                Телефон
            </th>
            <th>
                Когда отправлен
            </th>
            <th>
                Сумма
            </th>
            <th>
                Действия
            </th>
        </tr>
        {{-- циклом перебираем заказы --}}
            @foreach ($orders as $order )


            <tr>
                <td>{{$order->id}}</td>
                <td>{{{$order->name}}}</td>
                <td>{{{$order->email}}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->created_at->format('H:i d/m/Y')}}</td>
                <td>{{$order->calculateOrders()}} руб</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-success" type="button"
                        {{-- если есть права админа --}}
                          @if(Auth::user()->role_admin===1)
                           href="{{route('orders.show',$order)}}"
                          @else
                           {{-- если нет прав админа --}}
                           href="{{route('person.orders.show',$order)}}"
                           @endif
                           >Открыть</a>

                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{-- {{ $orders->links() }} --}}
</div>
@endsection
