
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel || Vue</title>


  <link rel="stylesheet"  href="/css/app.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  

  

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" v-model="search" @keyup="searchit" placeholder="(loadash search) => 1 Sec Delay" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="button" @click = "searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lara-Vue</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/images')}}/{{ Auth::user()->photo }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @can('isAuthor')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-user"></i>
              <p>
                Unrelated
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <router-link to="/complex1"  class="nav-link">
                  <i class="fas fa-home"></i>
                  <p>Query Builder # 1</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link  to="/complex2"  class="nav-link">
                  <i class="fas fa-h-square"></i>
                  <p>Complex Query # 2</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link  to="/complex3"  class="nav-link">
                  <i class="fas fa-archway"></i>
                  <p>Complex Query # 3</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link  to="/component4"  class="nav-link">
                  <i class="fas fa-archway"></i>
                  <p>Complex</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link  to="/conponent5"  class="nav-link">
                  <i class="fas fa-archway"></i>
                  <p>Facades - Service Container</p>
                </router-link>
              </li>
              
            </ul>
          </li>
          @endcan



          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="fas fa-cog"></i>
              <p>
                Manage Settings
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    Users Profile
                  </p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    User Profile
                    <span class="right badge badge-danger">View by - 89</span>
                  </p>
                </router-link>
              </li>





            </ul>
          </li>
            @can('isUser') 
              <li class="nav-item">
                <router-link to="/profile" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>
                    User Private Info
                    <span class="right badge badge-danger">Only You</span>
                  </p>
                </router-link>
              </li>
            @endcan 



          

          <li class="nav-item">
            <a  class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        
              <i class="fas fa-power-off"></i>
              <p>
                {{ __('Logout') }}
                
              </p>
            </a>
          </li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
          
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          <router-view></router-view>
          <vue-progress-bar></vue-progress-bar>
            
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Laravel, Vue, Node.js, Api
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php date('Y')?> <a href="https://github.com/asadpstu">Git Hub Source COde</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
<!-- <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App 
<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
