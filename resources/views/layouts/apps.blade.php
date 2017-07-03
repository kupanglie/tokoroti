<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
  <style type="text/css">
  .center {
    vertical-align: middle !important; 
    text-align: center !important;
  }
  .bold {
    font-weight: 700;
  }
  .no-padding {
    padding: 0
  }
  </style>
  @yield('custom-css')

  <title>@yield('title')</title>
  {!! Charts::assets() !!}
</head>

<body class="sidebar-mini fixed">
  <div class="wrapper">
    <!-- Navbar-->
    @include('partials.header')

    <!-- Side-Nav-->
    @include('partials.left-sidebar')
    <div class="content-wrapper">
      @yield('content')
    </div>
  </div>

  <!-- Javascripts-->
  <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/pace.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
  <!-- <script src="{{ asset('js/plugins/chart.js') }}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
  @yield('custom-js')
</body>
</html>