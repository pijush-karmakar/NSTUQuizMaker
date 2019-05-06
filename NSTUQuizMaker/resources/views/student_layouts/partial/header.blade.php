<div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>

             <!-- header area end -->


            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">

                                <li><a href="{{ route('student.dashboard') }}">Home</a></li>
                                <li><span>Dashboard</span></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                            
                            
                            {{-- For students only  --}}
                            
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"> {{ Auth::guard('student')->user()->name }}<i class="fa fa-angle-down"></i></h4>
                        

                            <div class="dropdown-menu">

                                
                                <a class="dropdown-item" href="{{ route('student.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->           