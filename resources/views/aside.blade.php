<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('/public/icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JunctionNet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ auth()->user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->role }}</a>
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(auth()->user()->role == "Admin")
         <li class="nav-item @if(Request::url() == url('/customers')) menu-open @endif">
            <a href="#" class="nav-link @if(Request::url() == url('/customers')) active  @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Customer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/customers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Customer</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item @if(Request::url() == url('/sellers')) menu-open @endif">
            <a href="#" class="nav-link @if(Request::url() == url('/sellers')) active  @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sellers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/sellers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sellers</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item @if(Request::url() == url('/buyers')) menu-open @endif">
            <a href="#" class="nav-link @if(Request::url() == url('/buyers')) active  @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Buyers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/buyers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Buyers</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(auth()->user()->role == "Admin")
          <li class="nav-item  @if(Request::url() == url('/classifiers')) menu-open @endif">
            <a href="#" class="nav-link @if(Request::url() == url('/classifiers')) active  @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Classifier
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/classifiers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View Classifier</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item @if(Request::url() == url('/tasks')) menu-open @endif">
            <a href="#" class="nav-link @if(Request::url() == url('/tasks')) active  @endif">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tasks
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/tasks')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Tasks</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>