<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
  /* =============================================
  * RADIO BUTTONS
  =============================================== */

  #radios label {
    cursor: pointer;
    position: relative;
  }

  #radios label + label {
    margin-left: 50px;
  }

  input[type="radio"] {
    opacity: 0; /* hidden but still tabable */
    position: absolute;
  }

  input[type="radio"] + span {
    font-family: 'Material Icons';
    color: #0d46a7;
    border-radius: 50%;
    padding: 25px;
    transition: all 0.4s;
    -webkit-transition: all 0.4s;
  }

  input[type="radio"]:checked + span {
    color: white;
    background-color: #4285F4;
  }

  input[type="radio"]:focus + span {
    color: #fff;  
  }

  /* ================ TOOLTIPS ================= */

  #radios label:hover::before {
    content: attr(for);
    font-family: Roboto, -apple-system, sans-serif;
    text-transform: capitalize;
    font-size: 11px;
    position: absolute;
    top: 170%;
    left: 0;
    right: 0;
    opacity: 0.75;
    background-color: #323232;
    color: #fff;	
    padding: 4px;
    border-radius: 3px;
    display: block;
  }
  .stepwizard-step p {
    margin-top: 10px;
  }
  .stepwizard-row {
      display: table-row;
  }
  .stepwizard {
      display: table;
      width: 100%;
      position: relative;
  }
  .stepwizard-step button[disabled] {
      opacity: 1 !important;
      filter: alpha(opacity=100) !important;
  }
  .stepwizard-row:before {
      top: 14px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 100%;
      height: 1px;
      background-color: #ccc;
      z-order: 0;
  }
  .stepwizard-step {
      display: table-cell;
      text-align: center;
      position: relative;
  }
  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
  }
  .displayNone{
    display: none;
  }
</style>
<body>
    <div id="app">
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
              <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
                  <a class="navbar-brand brand-logo" href="/admin/dashbord"><img src="{{ asset('assets/admin/images/logo.svg') }}" alt="logo"/></a>
                  <a class="navbar-brand brand-logo-mini" href="/admin/dashbord"><img src="{{ asset('assets/admin/images/logo-mini.svg') }}" alt="logo"/></a>
                  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-sort-variant"></span>
                  </button>
                </div>  
              </div>
              <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mr-lg-4 w-100">
                  <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                          <i class="mdi mdi-magnify"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" placeholder="{{ __('Rechercher un produit') }}" aria-label="search" aria-describedby="search">
                    </div>
                  </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item dropdown me-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
                      <i class="mdi mdi-message-text mx-0"></i>
                      <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                      <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                          <h6 class="ellipsis font-weight-normal">David Grey
                          </h6>
                          <p class="font-weight-light small-text text-muted mb-0">
                            The meeting is cancelled
                          </p>
                        </div>
                      </a>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                          <h6 class="ellipsis font-weight-normal">Tim Cook
                          </h6>
                          <p class="font-weight-light small-text text-muted mb-0">
                            New product launch
                          </p>
                        </div>
                      </a>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                            <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="item-content flex-grow">
                          <h6 class="ellipsis font-weight-normal"> Johnson
                          </h6>
                          <p class="font-weight-light small-text text-muted mb-0">
                            Upcoming board meeting
                          </p>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                      <i class="mdi mdi-bell mx-0"></i>
                      <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                      <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                          <div class="item-icon bg-success">
                            <i class="mdi mdi-information mx-0"></i>
                          </div>
                        </div>
                        <div class="item-content">
                          <h6 class="font-weight-normal">Application Error</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                            Just now
                          </p>
                        </div>
                      </a>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                          <div class="item-icon bg-warning">
                            <i class="mdi mdi-settings mx-0"></i>
                          </div>
                        </div>
                        <div class="item-content">
                          <h6 class="font-weight-normal">Settings</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                            Private message
                          </p>
                        </div>
                      </a>
                      <a class="dropdown-item">
                        <div class="item-thumbnail">
                          <div class="item-icon bg-info">
                            <i class="mdi mdi-account-box mx-0"></i>
                          </div>
                        </div>
                        <div class="item-content">
                          <h6 class="font-weight-normal">New user registration</h6>
                          <p class="font-weight-light small-text mb-0 text-muted">
                            2 days ago
                          </p>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                      <img src="{{ asset('assets/admin/images/faces/face5.jpg') }}" alt="profile"/>
                      <span class="nav-profile-name">{{ Auth::user()->username }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item">
                        <i class="mdi mdi-settings text-primary"></i>
                        Settings
                      </a>
                      <a class="dropdown-item">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                    </div>
                  </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="mdi mdi-menu"></span>
                </button>
              </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_sidebar.html -->
              <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/dashbord">
                      <i class="mdi mdi-home menu-icon"></i>
                      <span class="menu-title">Tableau de bord</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#product-link" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-plus-circle menu-icon"></i>
                      <span class="menu-title">Produit</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="product-link">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Tous les produits</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.product.create') }}">Ajouter un produit</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Couleurs</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Tailles</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#category-link" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-view-module menu-icon"></i>
                      <span class="menu-title">Categorie</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="category-link">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.index') }}">Toutes les categories</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category.create') }}">Ajouter une categorie</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#brand-link" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-view-list menu-icon"></i>
                      <span class="menu-title">Marque</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="brand-link">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Toutes les marques</a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand.create') }}">Ajouter une marque</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#user-link" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-account-multiple menu-icon"></i>
                      <span class="menu-title">Utilisateurs</span>
                      <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="user-link">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Tous les utilisateurs</a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Les clients fidèles</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/charts/chartjs.html">
                      <i class="mdi mdi-view-carousel menu-icon"></i>
                      <span class="menu-title">Accueil Slider</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/tables/basic-table.html">
                      <i class="mdi mdi-settings menu-icon"></i>
                      <span class="menu-title">Parametre du site</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- partial -->
              <div class="main-panel">
                <div class="content-wrapper">
                  @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
                </div>
                </footer>
                <!-- partial -->
              </div>
              <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
          </div>
    </div>
    <script src="{{ asset('assets/admin/vendors/base/vendor.bundle.base.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/js/jquery-3.7.1.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/admin/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.js') }}"></script>
</body>
</html>
