@extends('layouts.master')
@section('title', 'Моды для DAYZ')
@section('content')

            <p>Для люителей игры DAYZ. Большой выбор модов. Советские и зарубежные автомобили, мототехника, военная форма и оружие. Так же делаем моды по индивидуальному заказу. Для того чтобы заказать мод свяжитесь с автором в <a href="#"> VK</a></p>

            <h3>Категории</h3>
            <div class="row card-name">


                @foreach ($categories1 as $category)
                <div class="col-xs-12 col-md-6 col-xl-4 mb-3 cat-card">
                    <div class="img"><img src="{{Storage::url($category->image)}}" alt=""></div>


                  <h5>  <a class="menu-link active" aria-current="page" href="{{route('category', $category->code)}}" class="root">{{$category->name}}
                    </a></h5>


                </div>





                @endforeach



              </div>
              <br>
              <h3>Новинки</h3>
              <div class="row">

                @foreach ($products as $product )
                 @include('layouts.card', compact('product'))
                @endforeach




              </div>




@endsection
