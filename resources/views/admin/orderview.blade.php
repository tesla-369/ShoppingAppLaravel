<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <!-- End layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
    @include('admin.indexcontain.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.indexcontain.navbar')
        <!-- partial -->
        @include('admin.indexcontain.body')

        <h1>Order Table</h1>
        <div class="container mt-5">
          <div style="padding-left:0%">

            

            <form action="{{route('searchOrder')}}" method="GET">
              @csrf
            <input type="text" name="search" value=""> <br>
            <input type="submit" value="search">
            </form>
            


          </div>
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
                        <th>PDF <br>Download</th>
                        <th>Send Email</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $total_price=0?>
                    @forelse($order as $order)
                    <tr>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td><img height="100px" width="100px" src="product/{{ $order->image }}" alt=""></td>
                        <td>
                            @if($order->delivery_status=="delievered")
                            <p class="btn btn-danger">Not allow</p>
                            @else
                            <a href="{{route('delivery',$order->id)}}" class="btn btn-warning">Delivered</a>
                            @endif
                        </td>
                        <td>
                          <a href="{{route('pdfDownload',$order->id)}}" class="btn btn-warning">PDF Download</a>
                        </td>
                        <td>
                          <a href="{{route('sendEmail',$order->id)}}" class="btn btn-warning">Send Email</a>
                        </td>
                        
                        
                        
                    </tr>
                    <?php $total_price=$total_price+$order->price?>
                    @empty
                    <tr>
                      <td>no data found</td>
                    </tr>
                    @endforelse 
                </tbody>
            </table>
          
            <h1>Total Price=${{$total_price}}</h1>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    @include('admin.indexcontain.script')
  </body>
</html>
