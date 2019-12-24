 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'NSTUQuizzer') }} : Teacher dashboard</title> --}}
<title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/owl.transitions.css') }}">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/meanmenu/meanmenu.min.css') }}">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/animate.css') }}">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/normalize.css') }}">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/notika-custom-icon.css') }}">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/wave/waves.min.css') }}">

     <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/jquery.dataTables.min.css') }}">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/main.css') }}">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/style.css') }}">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="{{ asset('teacher-dashboard/css/responsive.css') }}">
    <!-- modernizr JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->


    @stack('css')
</head>

<body>

    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

 @include('student.layouts.partial.header')


@yield('content1')


    <!-- Content area start-->
    <div class="form-example-area">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- Content area End-->




 @include('teacher.layouts.partial.footer')

    <!-- jquery
        ============================================ -->
        <script src="{{ asset('teacher-dashboard/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/jquery-price-slider.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/owl.carousel.min.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/jquery.scrollUp.min.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/meanmenu/jquery.meanmenu.js') }}"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/counterup/counterup-active.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- jvectormap JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/jvectormap/jvectormap-active.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/sparkline/sparkline-active.js') }}"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/flot/flot-active.js') }}"></script>
    <!-- knob JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/knob/jquery.knob.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/knob/jquery.appear.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/knob/knob-active.js') }}"></script>
    <!--  wave JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/wave/waves.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/wave/wave-active.js') }}"></script>
    <!--  todo JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/todo/jquery.todo.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/plugins.js') }}"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/chat/moment.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/chat/jquery.chat.js') }}"></script>
      <!-- Data Table JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/data-table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('teacher-dashboard/js/data-table/data-table-act.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('teacher-dashboard/js/main.js') }}"></script>
    
    
    <!-- tawk chat JS
        ============================================ -->
    <!-- <script src="{{ asset('teacher-dashboard/js/tawk-chat.js') }}"></script> -->

</body>
</html>
