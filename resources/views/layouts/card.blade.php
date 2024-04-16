
                <div class="col-md-3 cat-card">
                    <div class="img-card"><img src="{{Storage::url($product->image)}}" alt=""></div>


                  <div class="container card-name">
                    <div class="row ">
                        <div class="col-12 ">
                    <a class="menu-link" aria-current="page" href="{{route('product',[$product->category->code, $product->code] )}}">
                        {{$product->name}}</a>
                    </div>
                    </div>
                    <div class="row card-price">
                        <div class="col-6 ">
                            <span>{{$product->price}} &#8381</span>

                        </div>
                        <form action="{{route('basket-add', $product)}}" method="POST">
                        <div class="col-6">
                            <button type="submit" class="btn btn-basket">Купить</button>
                        </div>
                        @csrf
                        </form>
                    </div>

                  </div>


                </div>


