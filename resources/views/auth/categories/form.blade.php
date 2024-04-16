@extends('auth.layouts.master')
{{-- чере isset проверяем наличие параметра категория и через опаратор точку добавлем название категории, если
категория найдена, то редактируем, если нет, то создать категорию
конструкция заменяет isset section else  section andisset --}}
@section('title', isset($category) ? 'Редактировать категорию '.$category->name : 'Создать категорию')

@section('content')
<div class="col-md-12">
    {{-- выводим название через @yield title --}}
    <h1>@yield('title')</h1>
    <form method="POST" enctype="multipart/form-data"
    @isset($category)
                       {{-- если есть категория то мы редактируем --}}
                      action="{{ route('categories.update', $category) }}"
                      @else
                      {{-- если нет, то создаем, так мы можем использовать одну форму --}}
                      action="{{ route('categories.store') }}"
                    @endisset >
        <div >
            @isset($category)
            {{-- спуфинг для проверки метода которым будет работать форма(регистарции.создании) --}}
                @method('PUT')
            @endisset
            @csrf
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">Код:</label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'code'])


                  {{-- {{ $category->code ?? "" }} заменяет "@isset($category){{$category->code}}@endisset"
                  если категория есть,
                   то в форме будет находится заполненная форма --}}
                    <input type="text" class="form-control" name="code" id="code" value=" {{ $category->code ?? "" }} ">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Название:</label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'name'])

                    <input type="text" class="form-control" name="name" id="name" value=" {{ $category->name ?? "" }} ">
                </div>
            </div>
            <br>
            <div class="input-group row">
                {{-- <label for="description" class="col-sm-2 col-form-label">Описание:</label>
                <div class="col-sm-6">
                    @include('auth.layouts.error', ['fieldName' => 'description'])
                    <textarea name="description" id="description" cols="72"
                    rows="7"> {{ $category->description ?? "" }} </textarea>
                </div> --}}
            </div>
            <br>
            <div class="input-group row">
                <label for="image" class="col-sm-2 col-form-label">Картинка:</label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">Загрузить<input type="file" style="display: none;"
                    name="image" id="image">
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Сохранить</button>
        </div>
    </form>
</div>
@endsection
