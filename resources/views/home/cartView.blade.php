
<!DOCTYPE html>
<html>
   <head>

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
      
      {{-- css of cart table starts here --}}
      <style>
        /* Custom CSS for table */
        .custom-table {
            border-collapse: collapse;
            width: 100%;
        }
    
        .custom-table th,
        .custom-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    
        .custom-table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
    
        .custom-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    
        .custom-table tr:hover {
            background-color: #ddd;
        }
    
        .custom-table img {
            max-width: 100px;
            height: auto;
        }
    
        .custom-table .action-buttons {
            white-space: nowrap;
        }
    </style>
    {{-- css of cart table ends here --}}
        
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.indexsection.headersection')
         <!-- end header section -->
         
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                         x
                    </button>
                        {{session()->get('message')}}
                </div>
            @endif

         {{-- cart table starts here --}}
         <table class="custom-table">
          <thead>
              <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $total_price=0?>
              @forelse($cart as $item)
              <tr>
                  <td>{{ $item['title'] }}</td>
                  <td>{{ $item['quantity'] }}</td>
                  <td>{{ $item['price'] }}</td>
                  
                  <td><img src="product/{{ $item['image'] }}" alt=""></td>
                  {{-- <td>
                    <a href="" class="btn btn-warning">edit</a>
                    <a href="{{route('deleteCart',$cart->id)}}" onclick="return confirm('are you sure want to delete?')" class="btn btn-danger">delete</a>
                  </td> --}}
                  <?php $total_price += $item['price']?>
              </tr>
              @empty
              <p>this is empty</p>
              @endforelse   
              
              
              
          </tbody>
      </table>
      <h1>Total Price=${{$total_price}}</h1>
      {{-- cart table ends here --}}
      <div style="text-align:center">     
      <a href="{{route('orderStore')}}" class="btn btn-success">Cash On Delivery</a>
      <a href="{{route('stripe',$total_price)}}" class="btn btn-warning">Payment Using Card</a>   
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