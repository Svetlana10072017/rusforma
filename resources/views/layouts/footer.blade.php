<footer class="mt-auto container-fluid">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-6 col-xl-4 mb-3">
                @isset($categories1)

                @foreach ($categories1 as $category)
                <nav class="nav flex-column">

                    <a class="nav-link active link-light" aria-current="page" href="{{route('category', $category->code)}}" class="root">{{$category->name}}</a>


                  </nav>
                  @endforeach
                  @endisset

            </div>
            <div class="col-xs-12 col-md-6 col-xl-4 mb-3">

                <nav class="nav flex-column">
                    <a class="nav-link active link-light" aria-current="page" href="{{'categories'}}">Все товары</a>
                    {{-- <a class="nav-link link-light" href="#">Инструкция по установке</a> --}}
                    <a class="nav-link link-light" href="#">Вход</a>
                  </nav>
            </div>
            <div class="col-xs-12 col-md-6 col-xl-4 mb-3">
                <nav class="nav flex-column">


            <h6 class= "nav-link link-light">Техподдержка:</h6>
            <a class="nav-link link-light" href="https://discord.gg/nGZCEEDYsG">Discord</a>

            <a class="icons" href="https://vk.com/market-199735329?screen=group">
                    <img src="{{asset('images/vk.png')}}" alt=""></a>

                </nav>




            </div>
          </div>
          <div class="row">
            <div class="col-12 foot">
               <span class="foot"> &#169 RUSFORMA Все права защищены.</span>

            </div>
            </div>

    </div>

</footer>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
