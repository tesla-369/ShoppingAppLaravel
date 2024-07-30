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
        <h1>hello</h1>
        
        <form action="{{route('categoryAdded')}}" method="post">
            @csrf
            <label for="">category</label>
            <input type="text" name="category" placeholder="enter your category">
            <button>Submit</button>
        </form>
        {{-- Table start --}}
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Category</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $categorys as $category )
                <tr>
                <td>{{$category->category}}</td>
                <td><a href="{{route('categoryDelete',$category->id)}}" onclick= "return confirm('Are you sure want to delete?')">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>

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
