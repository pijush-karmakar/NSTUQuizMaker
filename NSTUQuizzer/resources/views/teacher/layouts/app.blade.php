{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NSTUQuizzer') }} :: Teacher dashboard</title>

    <!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    Authentication Links
                    @if (Auth::guard('teacher')->guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('teacher')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('teacher.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

</div>
</body>
</html> --}}



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }} {{ ucfirst(config('multiauth.prefix')) }}</title> --}}

    <title>@yield('title') - {{ config('app.name', 'NSTUQuizzer') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('admin-dashboard/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-dashboard/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('admin-dashboard/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    @stack('css')


</head>

<body>


    <!-- login area start -->
    <div class="login-area login-bg">
         @yield('content')
    </div>



    <script src="{{ asset('admin-dashboard/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('admin-dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="{{ asset('admin-dashboard/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('admin-dashboard/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('admin-dashboard/js/plugins.js') }}"></script>
    <script src="{{ asset('admin-dashboard/js/scripts.js') }}"></script>



    @stack('js')



</body>

</html>