<style type="text/css">
  @media screen and (max-width: 400px){

    .navbar-nav .nav-item .nav-link {
        padding: 0.5rem !important;
        font-size: 14px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2px;
    }
  }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav d-flex" style="align-items: baseline;">
    @if(auth()->check())
    <li class="nav-item">
      <img width="100px" src="{{url('/public/PasswordLog.png')}}">
    </li>
    @endif
    
    
  </ul>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    @if(auth()->user()->role == "Admin")
    <li class="nav-item ">
      <a class="nav-link"  href="{{url('/users')}}" role="button">
        <i class="nav-icon fas fa-tachometer-alt"></i> Users
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link"  href="{{url('/site')}}" role="button">
        <i class="nav-icon far fa-calendar-alt px-1"></i> Manage Passwords
      </a>
    </li>
    @endif
    <li class="nav-item  d-none d-sm-inline-block">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item d-sm-inline-block border bg-dark">
      <form class="mb-0" action="{{ route('logout') }}" method="POST">
        @csrf
        <button  type="submit" class="nav-link text-white" style="margin-bottom: 0px;border: none;background: none;">Logout</button>
      </form>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> --}}
  </ul>
</nav>