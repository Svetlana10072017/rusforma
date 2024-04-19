@extends('layouts.master')
@section('title', 'Описание мода')
@section('content')


    <h3>
        {{$prodinfo->name}}

    </h3>
    <div class="row">

      <div class="col-sm-8 gallery">
            <div class="row big">
         <img src="{{Storage::url($prodinfo->image)}}" alt="" width="400">
            </div>
         <div class="row small">
            @foreach ($prodinfo->images as $image )


          <div class="col-2">

            <a href="{{Storage::url($image->image)}}">
               <img src="{{Storage::url($image->image)}}" alt="">
            </a>
           </div>
           @endforeach




         </div>
      </div>



        <div class="col-sm-4">

        <div class="descript">



            {{$prodinfo->description}}










        </div>

        <div class="price d-flex align-items-end"><span>   {{$prodinfo->price}}&#8381</span>
            <form action="{{route('basket-add', $prodinfo)}}" method="POST">
                <div class="col-6">
                    <button type="submit" class="btn btn-basket">Купить</button>
                </div>
                @csrf
                </form>
        </div>
        </div>
</div>
{{-- <div class="container-sm d-flex justify-content-center vid">
    <iframe src="https://vk.com/video_ext.php?oid=-199735329&id=456239112&hd=2"  allow="autoplay; encrypted-media; fullscreen; picture-in-picture;" frameborder="0" allowfullscreen></iframe>
      </div> --}}



@endsection
