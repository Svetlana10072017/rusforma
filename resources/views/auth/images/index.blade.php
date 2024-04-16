@extends('auth.layouts.master')
@section('title', 'Картинки для галереи')
@section('content')
            <div class="col-md-12">
                <h1>Картинки для галереи</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>
                                №
                            </th>
                            <th>
                                Название продукта
                            </th>
                            <th>
                                Картинка
                            </th>
                            <th>
                                Действия
                            </th>
                        </tr>
                        @foreach ($images  as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td>
                                {{$image->product->name}}
                            </td>
                            <td class="img-mini"><img src="{{Storage::url($image->image)}}" class="img-mini" alt="">
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <form action="{{route('images.destroy', $image)}}" method="POST">
                                        {{-- <a class="btn btn-success" type="button" href="{{route('images.show', $image)}}">Открыть</a> --}}
                                        <a class="btn btn-warning" type="button" href="{{route('images.edit', $image)}}">Редактировать</a>
                                        @csrf
                                        {{-- спуфинг для удаления -определяет какой метод убедт выполняться --}}
                                        @method('DELETE')
                                        <input class="btn btn-danger" type="submit" value="Удалить">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $images->links() }}
                <a class="btn btn-success" type="button" href="{{route('images.create')}}">Добавить картинку</a>
            </div>
            @endsection



