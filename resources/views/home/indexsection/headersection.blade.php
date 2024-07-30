<!-- header section strats -->
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{route('index')}}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('cartView')}}">Cart</a>
               </li>
                <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('orderView')}}">Order</a>
               </li>

         
                
                @if(Route::has('login'))
                 <!-- //pages after autheticating user lies here -->
                    @auth
                    <li class="nav-item">
                      <a class="nav-link" href="blog_list.html">Blog</a>
                   </li>
                   
                    </li>
                      <a href="{{route('logout')}}"><button>Logout</button></a>
                    </li>
                @else
                    </li>
                    <!-- //login and register option lies here -->
                        <a href="{{route('login')}}"><button>Login</button></a>
                
                        <a href="{{route('register')}}"><button>Register</button></a>
                    </li>
                    @endauth 
                @endif
                
             </ul>
          </div>
       </nav>
    </div>
 </header>
  <!-- end header section -->