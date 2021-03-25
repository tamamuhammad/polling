<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/all.min.css">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/css/daterangepicker.css">
  <style>
      #choice3, #choice4, #choice5 {
          display:none;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <span class="brand-text font-weight-light">YukPilih</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->username }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/polls" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  @if (auth()->user()->role == 'admin')
                Management Poll
                    @else
                        All Poll
                        @endif
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @if (auth()->user()->role == 'admin')
          <li class="nav-item">
            <a href="/users" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Management Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/divisions" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Management Divisions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="/mypoll" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Poll
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/update" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Update Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/suggest" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Suggest Poll
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
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

    @yield('container')

  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://tamamuhammad.github.io">Tamam Muhammad</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Module <b>Server Side</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/js/demo.js"></script>

<script>
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY/MM/DD hh:mm'
      }
    })

    const choice2 = document.querySelector('#choice2');
    const choice3 = document.querySelector('#choice3');
    const choice4 = document.querySelector('#choice4');
    const choice5 = document.querySelector('#choice5');

    choice2.addEventListener('keyup', function(){
        choice3.style.display = 'block';
        choice3.addEventListener('keyup', function(){
            choice4.style.display = 'block';
            choice4.addEventListener('keyup', function(){
               choice5.style.display = 'block';
            })
        })
    })
</script>
</body>
</html>