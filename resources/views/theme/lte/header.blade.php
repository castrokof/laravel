<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
 <!-- Left navbar links -->
 <ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
  </li>
  
</ul>

 <!-- SEARCH FORM -->
 <form class="form-inline ml-3">
  <div class="input-group input-group-sm">
    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-navbar" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"> {{Session()->get('usuario') ?? ''}}</i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{asset("assets/$theme/dist/img/user_default.jpg")}}") alt="User Avatar" class="img-size-50 mr-2 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                      <span class="float-right text-sm text-danger"><i></i></span>
                      Hola, {{Session()->get('usuario') ?? ''}}
                    </h3>
                    <i><a href="{{route('logout')}}" class="btn btn-block bg-gradient-warning btn-xs btn-flat">Logout</a></i>
                    <i><a href="{{route('login')}}" class="btn btn-block bg-gradient-info btn-xs btn-flat">Login</a> </i>                               
              </div>
              
            </div>
            <!-- Message End -->
          </a>
        </div>
      </li>
     
     
    </ul>
  </nav>
  <!-- /.navbar -->