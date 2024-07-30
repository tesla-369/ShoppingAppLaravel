<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public"> //base link for css
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
        <div class="container mt-5">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                {{session()->get('message')}}
            </div>
            @endif
          <h2>Product Form</h2>
          @if($products)
            <form method="Post" action="{{route('updateProduct',$products->id)}}" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" id="title" value="{{$products->title}}" placeholder="Enter title" required>
            </div>
            <div class="form-group">
              <label for="description">Description:</label>
              {{-- <textarea class="form-control" name="description" id="description"  placeholder="Enter description" required></textarea> --}}
              <input type="text" class="form-control" name="description" id="description" value="{{$products->description}}" placeholder="Enter description" required>  
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="price">Price:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{$products->price}}" placeholder="Enter price" required>
              </div>
              <div class="form-group col-md-6">
                <label for="discount">Discount:</label>
                <input type="number" class="form-control" name="discount" id="discount" value="{{$products->discount}}" placeholder="Enter discount">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="{{$products->quantity}}" placeholder="Enter quantity" required>
              </div>
              {{-- category starts --}}
              <div class="form-group col-md-6">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
          
                @endforeach

        
                  
                  <!-- Add more options as needed -->
                </select>
              </div>
              {{-- category ends --}}
            </div>
            <div class="form-group">
              <label for="image">Current Image:</label>
              <img height='100' width='100' src="product/{{$products->image}}" alt="choose image">
            </div>
            <div class="form-group">
                <label for="image">Change Image:</label>
                <input type="file" name="image" class="form-control-file" id="image" >
              </div>
            <button type="submit" onclick="return confirm('Are you sure you want to update?')" class="btn btn-primary">Update Product</button>
          </form>
          @endif
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
