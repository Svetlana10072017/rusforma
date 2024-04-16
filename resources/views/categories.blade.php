@extends('layouts.master')
@section('title', 'Все моды')
@section('content')
@if($products->count()==0)
<h5>Поиск не дал результатов</h5>
<br>
<br>
<a class="menu-link" aria-current="page" href="{{route('index')}}">На главную</a>
<br>
<br>
<br>
<br>

@else
<h3>Все продукты</h3>
@endif

<div class="row ">

@foreach ($products as $product )
@include('layouts.card', compact('product'))
@endforeach


</div>
<br><br>
{{$products->links()}}










	@endsection
