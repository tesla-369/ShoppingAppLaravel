<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       
       {{-- search for products --}}
       <div>
         <form action="{{route('searchProduct')}}" method="GET">
            @csrf
            <input type="text" name="search" value="">
            <input type="submit" name="" value="search ">
         </form>
       </div>
       {{-- end of search of products --}}

       <div class="row">
         @foreach($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
   @if(Route::has('login'))
    @auth
        <!-- If the user is authenticated -->
        <form action="{{ route('addToCart', $products->id) }}" method="POST">
            @csrf
            <div>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button type="submit" class="option1">Add to Cart</button>
            </div>
        </form>
        <a href="{{ route('productDetail', $products->id) }}" class="option2">Product Detail</a>
    @else
        <!-- If the user is not authenticated -->
        <form action="{{ route('addToCart', $products->id) }}" method="POST">
         @csrf
            <div>
                <button type="submit" class="option1">Add to Cart</button>
                <a href="{{ route('productDetail', $products->id) }}" class="option2">Product Detail</a>
            </div>
        </form>
    @endauth 
@endif
                     
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>

                      {{$products->title}}
                   </h5>
                   <h6 style="text-decoration:line-through; color:red">
                      O.Price={{$products->price}}
                   </h6>
                   <h6 style=" color:blue">
                     D.Price={{$products->discount}}
                  </h6>
                </div>
             </div>
          </div>
          @endforeach

          <!-- Display Bootstrap 5 pagination links -->
         <div class="d-flex justify-content-center">
            {{ $product->appends(request()->query())->links('pagination::bootstrap-5') }}
         </div> 
         
    </div>
 </section>