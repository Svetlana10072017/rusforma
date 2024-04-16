@extends('auth.layouts.master')
{{-- чере isset проверяем наличие продукта  и через опаратор точку добавлем название продукта, если
продукт найден, то редактируем, если нет, то создать продукт
конструкция заменяет isset section else  section andisset --}}
@section('title', isset($product) ? 'Редактировать товар '.$product->name : 'Создать товар')


@section('content')
    <div class="col-md-12">
         {{-- выводим название через @yield title --}}
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              {{-- если есть продукт то мы редактируем --}}
              action="{{ route('products.update', $product) }}"
              {{-- если нет, то создаем, так мы можем использовать одну форму --}}
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)

                 {{-- спуфинг для проверки метода которым будет работать форма(регистарции.создании) --}}

                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                         {{-- {{ $product->code ?? "" }} заменяет "@isset($product){{$product->code}}@endisset"
                  если продукт есть,
                   то в форме будет находится заполненная форма --}}
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{ $product->code ?? "" }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $product->name ?? "" }}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                               {{-- цикл, список должен быть динамичным, чтобы можно было добавить новую категорию,
                                созданную в форме для категории --}}
                           @foreach($categories as $category)
                           {{-- выбор категории --}}
                           <option value="{{ $category->id }}"
                           @isset($product)
                           {{-- если в продукте сопадает категория id c тем id, что в цикле, то selected --}}
                               @if($product->category_id == $category->id)
                                   selected
                                   @endif
                               @endisset
                           >{{ $category->name }}</option>
                       @endforeach

                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description'])
								<textarea name="description" id="description" cols="72"
                                          rows="7">{{ $product->description?? "" }}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{ $product->price ?? "" }}">
                    </div>
                </div>
                <br>
                {{-- <a href="{{route('images.index')}}">Добавить галлерею</a><br> --}}
                @foreach ([//перебор по тайтл для чекбоксов, для выбора чекбокса
                'hit' => 'Хит',
                'new' => 'Новинка',
                'recommend' => 'Рекомендуемые'
                ] as $field => $title)
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">{{ $title }}: </label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="{{$field}}" id="{{$field}}"
                            {{-- если найден прдукт и поле 1, то у нас будет чекд, передача данных в бд --}}
                            @if(isset($product) && $product->$field === 1)
                                   checked="'checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>
                @endforeach

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
