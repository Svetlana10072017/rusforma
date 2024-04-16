
@include('layouts.heder')

    <section>
        <div class="container">
            {{-- используем цикл if, если сессия успешно добавила товар-то вывод сообщения success иначе warning  --}}
        @if(session()->has('success'))
        <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif
        @if(session()->has('warning'))
        <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
            @yield('content')


        </div>
    </section>

@include('layouts.footer')




