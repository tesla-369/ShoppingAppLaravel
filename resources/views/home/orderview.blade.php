
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
      
      {{-- css of order table starts here --}}
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
    {{-- css of order table ends here --}}
        
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

         {{-- order table starts here --}}
         <table class="custom-table">
          <thead>
              <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>payment_status</th>
                  <th>delivery_status</th>
                  <th>Image</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
            <?php $total_price=0?>
              @foreach($order as $order)
              <tr>
                  <td>{{ $order->product_name }}</td>
                  <td>{{ $order->quantity }}</td>
                  <td>${{ $order->price }}</td>
                  <td>{{ $order->payment_status }}</td>
                  <td>{{ $order->delivery_status }}</td>
                  <td><img src="product/{{ $order->image }}" alt=""></td>
                  <td>
                    @if($order->delivery_status=="processing")
                    <a href="{{route('cancelOrder',$order->id)}}" class="btn btn-warning">Cancel</a>
                    @else
                    <p class="btn btn-danger">Not Allow</p>
                    @endif
                  </td>
              </tr>
              <?php $total_price=$total_price+$order->price?>
              @endforeach
          </tbody>
      </table>
      <h1>Total Price=${{$total_price}}</h1>
      {{-- order table ends here --}}
      

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