<!DOCTYPE html>
<html>
   <head>
    <base href="/public"> {{-- shows CSS inside public folder --}}
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
        .div_position{
            align:center;
            
            border:2px solid Tomato;
        }

        /* Add your custom styles here */
        .product-image {
            max-width: 100%;
            height: auto;
        }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
      @include('home.indexsection.headersection')
         <!-- end header section -->
      

      <div class="container mt-5">
        @if($product)
        <div class="row">
            <div class="col-lg-6">
                <img src="product/{{$product->image}}" alt="Product Image" class="product-image img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title mb-4">{{$product->title}}</h2>
                        
                        <p class="card-text"><strong>Price:</strong> {{$product->price}}</p>
                        <p class="card-text"><strong>Description:</strong> {{$product->description}}</p>
                        <p class="card-text"><strong>Category:</strong> {{$product->category}}</p>
                        <p class="card-text"><strong>Discount:</strong> {{$product->discount}}</p>
                        <p class="card-text"><strong>Quantity:</strong> {{$product->quantity}}</p>
                        
                        <form action="{{route('addToCart',$product->id)}}" method="POST">
                            @csrf
                            <input type="number" id="quantity" name="quantity" min="1" value="1">
                            <button type="submit" class="btn btn-primary" >Add to Cart</button>
                            </form> 
                    </div>
                </div>
            </div>
            
        </div>
        @endif
    </div>
     
    
      <!-- footer start -->
      @include('home.indexsection.footer') 
      <!-- footer end -->

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>