@extends('auth.layouts.master')
{{-- чере isset проверяем наличие продукта  и через опаратор точку добавлем название продукта, если
продукт найден, то редактируем, если нет, то создать продукт
конструкция заменяет isset section else  section andisset --}}
@section('title', isset($image) ? 'Редактировать картинку ': 'Создать картинку')


@section('content')
    <div class="col-md-12">
         {{-- выводим название через @yield title --}}
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              @isset($image)
              {{-- если есть продукт то мы редактируем --}}
              action="{{ route('images.update', $image) }}"
              {{-- если нет, то создаем, так мы можем использовать одну форму --}}
              @else
              action="{{ route('images.store') }}"
            @endisset
        >
            <div>
                @isset($image)

                 {{-- спуфинг для проверки метода которым будет работать форма(регистарции.создании) --}}

                    @method('PUT')
                @endisset
                @csrf
               <div class="input-group row">
                    {{--  <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'code']) --}}
                         {{-- {{ $product->code ?? "" }} заменяет "@isset($product){{$product->code}}@endisset"
                  если продукт есть,
                   то в форме будет находится заполненная форма --}}
                        {{-- <input type="text" class="form-control" name="code" id="code"
                               value="{{ $product->code ?? "" }}">
                    </div> --}}
                </div>
                <br>
                {{-- <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $product->name ?? "" }}">
                    </div>
                </div> --}}
                <br>
                <div class="input-group row">



                    <label for="product_id" class="col-sm-2 col-form-label">Продукт: </label>
                    <div class="col-sm-6">
                        <select name="product_id" id="product_id" class="form-control js-select2" placeholder="Выберите товар">
                               {{-- цикл, список должен быть динамичным, чтобы можно было добавить новую категорию,
                                созданную в форме для категории --}}
                           @foreach($products as $product)
                           {{-- выбор категории --}}
                           <option value="{{ $product->id }}"
                           @isset($image)
                           {{-- если в продукте сопадает категория id c тем id, что в цикле, то selected --}}
                               @if($image->product_id == $product->id)
                                   selected
                                   @endif
                               @endisset
                           >
                           {{ $product->name }}
                        </option>
                       @endforeach

                        </select>
                    </div>
                </div>
                <br>
                {{-- <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'description'])
								<textarea name="description" id="description" cols="72"
                                          rows="7">{{ $product->description?? "" }}</textarea>
                    </div>
                </div> --}}
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
                {{-- <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{ $product->price ?? "" }}">
                    </div>
                </div> --}}
                <br>

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
