<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>@yield('title', 'ZeDeX Event Management System')</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Iddu Emmanuel" />

  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,600i,700"
    rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ asset('client/css/animate.css') }}">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{ asset('client/css/icomoon.css') }}">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{ asset('client/css/bootstrap.css') }}">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="{{ asset('client/css/flexslider.css') }}">

  <link rel="stylesheet" href="{{ asset('client/css/base.css') }}" type="text/css" />

  <!-- Theme style  -->
  <link rel="stylesheet" href="{{ asset('client/css/style.css') }}">

  <!-- Modernizr JS -->
  <script src="{{ asset('client/js/modernizr-2.6.2.min.js') }}"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="zedex-loader"></div>

  @include('client.header')

  @yield('pageContent')

  @include('client.footer')

  <!-- jQuery -->
  <script src="{{ asset('client/js/jquery.min.js') }}"></script>
  <!-- jQuery Easing -->
  <script src="{{ asset('client/js/jquery.easing.1.3.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
  <!-- Waypoints -->
  <script src="{{ asset('client/js/jquery.waypoints.min.js') }}"></script>
  <!-- Stellar Parallax -->
  <script src="{{ asset('client/js/jquery.stellar.min.js') }}"></script>
  <!-- Flexslider -->
  <script src="{{ asset('client/js/jquery.flexslider-min.js') }}"></script>
  <!-- Owl carousel -->
  <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('client/js/magnific-popup-options.js') }}"></script>
  <!-- Date Picker -->
  <script src="{{ asset('client/js/bootstrap-datepicker.js') }}"></script>
  <!-- Stellar Parallax -->
  <script src="{{ asset('client/js/jquery.stellar.min.js') }}"></script>
  <!-- Main -->
  <script src="{{ asset('client/js/main.js') }}"></script>

  @yield('scripts')
</body>

</html>