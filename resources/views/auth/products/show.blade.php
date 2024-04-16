@extends('auth.layouts.master')

@section('title', 'Продукт ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($product->image) }}" ></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                {{-- <td>Лейблы</td> --}}
                <td>
                    {{-- добавляем отображение чекбоксов --}}
                       {{-- если продукт новый, то добавляем надпись --}}
                    {{-- @if($product->isNew())
                         <span class="badge badge-new">Новинка</span>
                    @endif
                      {{-- если продукт рекомендуемый --}}
                    {{-- @if($product->isRecommend())
                         <span class="badge badge-recommend">Рекомендуем</span>
                    @endif
                      {{-- если хит --}}
                    {{-- @if($product->isHit())
                         <span class="badge badge-hit">Хит продаж!</span>
                    @endif  --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
