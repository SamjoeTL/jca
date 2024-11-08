<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Jembatan Cemerlang Abadi">
  <meta name="keywords" content="Jembatan Cemerlang Abadi Guest House, Guest House Canggu, Canggu, Bali">
  <meta name="author" content="Patras Dev">
  <title>JCA - @yield('title-head')</title>
  <link rel="icon" href="{{asset('icon.ico')}}" type="image/x-icon"> <!-- Favicon-->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

  @stack('vendor-css')

  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-profile.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-quill-editor.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/plugins/pnotify/pnotify.custom.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/plugins/dropify/css/dropify.min.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/plugins/datepicker/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/plugins/yearpicker/yearpicker.css')}}">

  @stack('page-css')
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

  <div id="loader" class="loader" style="display: none">
    <div class="loader-container"></div>
  </div>

  <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-shadow bg-dark">
    <div class="navbar-container d-flex content">
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
          <li class="nav-item">
            <a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i>
            </a>
          </li>
        </ul>
      </div>
      <ul class="nav navbar-nav align-items-center">
        <span class="mx-50 text-white d-none d-lg-block">{{ (new \App\Helper)->haritanggal(date('Y-m-d')) }}</span>
      </ul>
      <ul class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex">
              <span class="user-name font-weight-bolder d-sm-flex d-none">{{Auth::user()->nama}}</span>
              {{-- <span class="user-status d-sm-flex d-none">Admin</span> --}}
            </div>
            <span class="avatar">
                <img class="rounded" src="{{asset(auth::user()->foto)}}" height="40" style="border: 2px solid #b9b9c3">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            <div class="dropdown-item font-weight-bolder d-md-none">{{Auth::user()->nama}}</div>
            <div class="dropdown-divider d-md-none"></div>
            <a class="dropdown-item" href="#modal-password" data-toggle="modal" data-target="#modal-password" data-backdrop="static" class="dropdown-item"><i class="mr-50" data-feather="lock"></i> Ubah Password</a>
            </a>
            <a class="dropdown-item" href="{{ route('logout') }} " class="dropdown-item"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="mr-50" data-feather="power"></i> Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="main-menu menu-fixed menu-dark bg-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto">
          <a class="navbar-brand" href="#">
            <span class="brand-logo">
              <img src="{{asset('assets/img/logo-footer.png')}}" height="34" alt="">
            </span>
            <h2 class="brand-text text-light">JCA</h2>
          </a>
        </li>
        <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
            <i class="d-block d-xl-none text-warning toggle-icon font-medium-4" data-feather="x"></i>
            <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
          </a>
        </li>
      </ul>
    </div>
    <div class="dropdown-divider mt-1 mb-0" style="border-top: 1px solid #4b4b4b"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main bg-dark" id="main-menu-navigation" data-menu="menu-navigation">
        @yield('menu')
      </ul>
    </div>
  </div>

  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
  </div>

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  <footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
      <span class="float-md-left d-block d-md-inline-block">
        Jembatan Cemerlang Abadi &copy; 2024 - by
        <a class="ml-25" href="http://patrasdev.co.id" target="_blank">Patras Dev</a>
      </span>
    </p>
  </footer>
  <button class="btn btn-success btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>

  @yield('modal')

  <div class="modal fade" id="modal-password" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">UBAH PASSWORD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" action="{{route('admin.user.ubahpassword')}}" method="post">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password Lama</label>
              <div class="col-sm-8">
                <div class="input-group input-group-merge form-password-toggle">
                  <input class="form-control form-control-merge" type="password" name="passwordlama" aria-describedby="password" tabindex="2" required>
                  <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password Baru</label>
              <div class="col-sm-8">
                <div class="input-group input-group-merge form-password-toggle">
                  <input class="form-control form-control-merge" type="password" name="passwordbaru" aria-describedby="password" tabindex="2" required>
                  <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
              </div>
            </div>
            {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-danger">Ubah</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/charts/chart-apex.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/forms/form-validation.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/pages/page-profile.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
  <script src="{{asset('app-assets/plugins/pnotify/pnotify.custom.min.js') }}"></script>
  <script src="{{asset('app-assets/plugins/dropify/js/dropify.min.js')}}"></script>
  <script src="{{asset('app-assets/plugins/dropify/js/dropify.js')}}"></script>
  <script src="{{asset('app-assets/plugins/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('app-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('app-assets/plugins/datepicker/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{asset('app-assets/plugins/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{asset('app-assets/plugins/yearpicker/yearpicker.js') }}"></script>
  <script src="{{asset('app-assets/plugins/inputmask/inputmask.js') }}"></script>
  <script src="{{asset('app-assets/plugins/inputmask/jquery.inputmask.js') }}"></script>
  <script src="{{asset('app-assets/plugins/inputmask/inputmask.numeric.extensions.js') }}"></script>
  <script src="{{asset('app-assets/plugins/handlebars/handlebars-v4.0.10.js') }}"></script>
  <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
  <script src="{{asset('app-assets/js/core/app.js')}}"></script>

  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })

    function notifikasi(notif) {
      new PNotify({
        title: notif.title,
        text: notif.text,
        type: notif.type,
        desktop: {
          desktop: true
        }
      }).get().click(function(e) {
        if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
      });
    }

    if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
      notifikasi({!! session('notif') !!});
    }

    $('.datesingle').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: 'YYYY-MM-DD'
      }
    });

    $('.date').daterangepicker({
    showDropdowns: true,
    locale: {
        format: 'YYYY-MM-DD'
      }
    });

    $('.datebulan').datepicker(
      {
        autoclose: true,
        format: "yyyy-m",
        viewMode: "months",
        minViewMode: "months"
      }
    );

    $('.tahun').yearpicker(
      {
        autoclose: true,
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      }
    );

    $('.rp').inputmask("numeric", {
      radixPoint: ",",
      groupSeparator: ".",
      digits: 2,
      autoGroup: true,
      prefix: 'Rp ',
      rightAlign: false,
    });

  </script>

  @stack('vendor-js')
  @stack('page-js')

</body>
