<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Brosasia Admin - @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/backend') }}/img/favicon.png" rel="icon">
  <link href="{{asset('assets/backend') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/backend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('assets/backend') }}/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/backend') }}/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{asset('assets/backend') }}/img/logo.png" alt="Brosasia Logo">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="rounded-circle bg-primary text-white font-weight-bold" style="padding: 3px 13px;font-size: 20px;font-family:Nunito, sans-serif;">{{ substr(Auth::user()->name,0,1) }}</span>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'collapsed' : '' }}" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/category')) ? 'collapsed' : '' }}" href="{{ route('category') }}">
          <i class="bi bi-tag"></i>
          <span>Category options</span>
        </a>
      </li><!-- End Category Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/subcategory')) ? 'collapsed' : '' }}" href="{{ route('subcategory') }}">
          <i class="bi bi-tags"></i>
          <span>Sub Category options</span>
        </a>
      </li><!-- End SubCategory Nav -->



      <li class="nav-item">
        <a class="nav-link {{ (request()->is('admin/posts/*')) ? 'collapsed' : '' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
          <i class="bi bi-files"></i><span>Post Options</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse {{ (request()->is('admin/posts/*')) ? 'show' : '' }}" data-bs-parent="#sidebar-nav" style="">
          <li>
            <a href="{{ route('posts') }}" class="{{ (request()->is('admin/posts/manage')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Manage Posts</span>
            </a>
          </li>
          <li>
            <a href="{{ route('new.post') }}" class="{{ (request()->is('admin/posts/new')) ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>New Post</span>
            </a>
          </li>
        </ul>
      </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main>






  <!-- Vendor JS Files -->
  <script src="{{asset('assets/backend') }}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/chart.js/chart.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/quill/quill.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('assets/backend') }}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/backend') }}/js/main.js"></script>
  <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}

  <script src="{{asset('assets/backend') }}/js/ajax.js"></script>
<script>
  function preview() {
    frame.src = URL.createObjectURL(event.target.files[0]);
  }
</script>

</body>

</html>