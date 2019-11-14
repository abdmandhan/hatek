<!doctype html>
<html lang="en">
<head>
    <title>Teknik Komputer &mdash; SV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("templates/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("templates/css/jquery-ui.css")}}">
    <link rel="stylesheet" href="{{ asset("templates/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{ asset("templates/css/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{ asset("templates/css/owl.theme.default.min.css")}}">

    <link rel="stylesheet" href="{{ asset("templates/css/jquery.fancybox.min.css")}}">

    <link rel="stylesheet" href="{{ asset("templates/css/bootstrap-datepicker.css")}}">

    <link rel="stylesheet" href="{{ asset("templates/fonts/flaticon/font/flaticon.css")}}">
    <link rel="stylesheet" href="{{ asset("templates/fonts/icomoon/style.css")}}">

    <link rel="stylesheet" href="{{ asset("templates/css/aos.css")}}">

    <link rel="stylesheet" href="{{ asset("templates/css/style.css")}}">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('layouts.navbar')
    
        @yield('content')

  
    <script src="{{ asset("templates/js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{ asset("templates/js/jquery-ui.js")}}"></script>
    <script src="{{ asset("templates/js/popper.min.js")}}"></script>
    <script src="{{ asset("templates/js/bootstrap.min.js")}}"></script>
    <script src="{{ asset("templates/js/owl.carousel.min.js")}}"></script>
    <script src="{{ asset("templates/js/jquery.countdown.min.js")}}"></script>
    <script src="{{ asset("templates/js/jquery.easing.1.3.js")}}"></script>
    <script src="{{ asset("templates/js/aos.js")}}"></script>
    <script src="{{ asset("templates/js/jquery.fancybox.min.js")}}"></script>
    <script src="{{ asset("templates/js/jquery.sticky.js")}}"></script>
    <script src="{{ asset("templates/js/isotope.pkgd.min.js")}}"></script>
    
    
    <script src="{{ asset("templates/js/main.js")}}"></script>
    
    @stack('changeBackground')
    
</body>
</html>