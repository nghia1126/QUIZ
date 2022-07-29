<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{PUBLIC_URL}}index3.html" class="brand-link">
      <img src="{{PUBLIC_URL}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{PUBLIC_URL}}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{PUBLIC_URL}}#" class="d-block">{{$_SESSION['auth']['name']}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{PUBLIC_URL}}#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?= BASE_URL . 'mon-hoc'?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Subject
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="<?= BASE_URL. 'quiz'?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quiz
              </p>
            </a>
          </li>
          <li class="nav-item">

        <a href="<?= BASE_URL. 'sign-out'?>" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
        </a>
      </li>
        </ul>
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>