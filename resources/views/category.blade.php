@extends('layouts.master')
@section('title', 'Товары категории')
@section('content')


    <h3>{{$category->name}}</h3>
    <div class="row">
        @foreach ($category->products as $product )
          @include('layouts.card', compact('product'))
        @endforeach

    </div>



@endsection
