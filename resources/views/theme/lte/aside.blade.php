 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset("assets/$theme/dist/img/logosintecos.png")}}"
           alt="Sinteco"
           class="brand-image img-circle elevation-2"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mante-Sinteco</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("assets/$theme/dist/img/user_default.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Session()->get('nombre_usuario') ?? ''}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="sidebar-menu" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <div class="user-panel mt-1 pb-1 mb-1 d-flex">
            <a class="nav-link">
              <p> Menú Principal</p>
            </a>
          </div>
           @foreach ($menusComposer as $key => $item)
               @if($item["menu_id"] != 0)
                 @break
               @endif 
               @include("theme.$theme.menu-item", ["item" => $item]) 
           @endforeach  
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
