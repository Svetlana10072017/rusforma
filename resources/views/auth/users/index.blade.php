@extends('auth.layouts.master')

@section('title', 'Пользователи')

@section('content')
    <div class="col-md-12">
        <h1>Пользователи</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    №
                </th>

<th>
    Имя
</th>
<th>
    Электронный адрес
</th>
<th>
    Права администратора
</th>
<th>
    Действия
</th>
</tr>
@foreach($users as $user)
<tr>
    <td>{{ $user->id}}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role_admin }}</td>
    <td>
        <div class="btn-group" role="group">
            <form action="{{ route('users.destroy', $user) }}" method="POST">

                <a class="btn btn-warning" type="button"
                   href="{{ route('users.edit', $user) }}">Редактировать</a>
                @csrf
            {{-- спуфинг для удаления -определяет какой метод убедт выполняться --}}
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Удалить"></form>
        </div>
    </td>
</tr>
@endforeach
</tbody>
</table>
{{-- добавляет отоборажение товаров на главной по страницам --}}
{{$users->links()}}
{{-- <a class="btn btn-success" type="button" href="{{ route('userss.create') }}">Добавить товар</a> --}}
</div>
@endsection
