<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">TenDers<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('tendercall')}}">Add Tenders</a></li>
          <li><a class="nav-link scrollto" href="{{route('bid')}}">View Tenders</a></li>


          {{-- <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">drop</a></li>
              <li class="dropdown"><a href="#"><span>Construction</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @if(Session::has('adminId') || Session::has('userId'))
      <a href="{{route('logout')}}" class="get-started-btn scrollto">logout</a>
      <a href="{{route('userlogin')}}" class="get-started-btn scrollto">Dashboard</a>
      @else
      <a href="{{route('loginget')}}" class="get-started-btn scrollto">Login/Signup</a>
      {{-- <a href="{{route('register')}}" class="get-started-btn scrollto">signup</a> --}}

      @endif
    </div>
  </header><!-- End Header -->
