@extends('auth.layouts.master')
{{-- чере isset проверяем наличие продукта  и через опаратор точку добавлем название продукта, если
продукт найден, то редактируем, если нет, то создать продукт
конструкция заменяет isset section else  section andisset --}}
@section('title', 'Редактировать пользователя '.$user->name )


@section('content')
    <div class="col-md-12">
         {{-- выводим название через @yield title --}}
        <h1>@yield('title')</h1>
        <form method="POST" enctype="multipart/form-data"
              @isset($user)
              {{-- если есть продукт то мы редактируем --}}
              action="{{ route('users.update', $user) }}"
              {{-- если нет, то создаем, так мы можем использовать одну форму --}}
              @else
              action="{{ route('users.store') }}"



            @endisset
        >
            <div>
                @isset($user)

                 {{-- спуфинг для проверки метода которым будет работать форма(регистарции.создании) --}}

                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Имя:</label>
                    <div class="col-sm-6">
                        {{-- @include('auth.layouts.error', ['fieldName' => 'code']) --}}

                        <input type="text" class="form-control" name="name" id="name"
                               value="{{ $user->name ?? "" }}">
                    </div>
                </div>
                <br>



                <div class="input-group row">
                    <label for="email" class="col-sm-2 col-form-label">e-mail: </label>
                    <div class="col-sm-2">
                        {{-- @include('auth.layouts.error', ['fieldName' => 'price']) --}}
                        <input type="text" class="form-control" name="email" id="email"
                               value="{{ $user->email ?? "" }}">
                    </div>
                </div>
                <br>

                    <div class="form-group row">
                        <label for="role_admin" class="col-sm-2 col-form-label">Права админа: </label>
                        <div class="col-sm-10">
                            <input type="checkbox" name="role_admin" id="role_admin"
                            {{-- если найден прдукт и поле 1, то у нас будет чекд, передача данных в бд --}}
                            @if(isset($user) && $user->role_admin === 1)
                                   checked="checked"
                                @endif
                            >
                        </div>
                    </div>
                    <br>

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
