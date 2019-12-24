
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="{{ route('student.dashboard') }}"><img src="{{ asset('teacher-dashboard/img/logo/nstuquizzer logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">              

                <!-- Authentication Links -->

                    @if (Auth::guard('student')->guest())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('student')->user()->name }} <span class="caret"></span>
                            </a>

                            <div style="right:0px; border: 1px solid #00c292; border-top: 0px !important;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="menu-a" href="{{ route('student.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>

                        </li>
                    @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->