@extends('auth.layouts.master')
@section('title','Описание категории')
@section('content')

            <div class="col-md-12">

            <h1>Категория {{$category->name}}</h1>
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
                        <td>{{$category->id}}</td>
                    </tr>
                    <tr>
                        <td>Код</td>
                        <td>{{$category->code}}</td>
                    </tr>
                    <tr>
                        <td>Название</td>
                        <td>{{$category->name}}</td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td>{{$category->description}}</td>
                    </tr>
                    <tr>
                        <td>Картинка</td>
                        {{-- используем фассад сторадж для отображения картинки --}}
                        <td><img src="{{ Storage::url($category->image) }}"></td>
                    </tr>
                    <tr>
                        <td>Кол-во товара</td>
                        <td>{{$category->products->count()}}</td>
                    </tr>
                </tbody>
            </table>
            </div>
 @endsection



