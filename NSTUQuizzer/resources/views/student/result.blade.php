 @extends('student.layouts.dashboard_app')
@section('title','Student Dashboard')

@section('content1')

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Home" href="#">Home</a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="#">Dashboard</a></li>
                                        <li><a href="#">My info</a></li>                                       
                                    </ul>
                                </li>
                               
                               
                                <li><a data-toggle="collapse" data-target="#mb_results" href="#">Results</a>
                                    <ul id="mb_results" class="collapse dropdown-header-top">
                                        <li><a href="#">View result</a></li>
                                    </ul>
                                </li>   

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    
    <!-- Main Menu area start-->
    <div style="padding: 40px 0px">
        <div class="main-menu-area mg-tb-40" style="margin: 0px !important">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                            

                            <li ><a data-toggle="tab" href="#Home"><i class="fa fa-home"></i> Home</a>
                            </li>

                            
                            </li>
                            <li class="active"><a data-toggle="tab" href="#Results"><i class="fa fa-bar-chart"></i> Results</a>

                            </li>
                        </ul>

                        <div class="tab-content custom-menu-content">
                            <div id="Home" class="tab-pane notika-tab-menu-bg animated fadeIn">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="{{ route('student.dashboard') }}">Dashboard</a>
                                    </li> 
                                    <li><a href="#">My info</a>
                                    </li>                                
                                </ul>
                            </div>
                            
                            
                            
                            <div id="Results" class="tab-pane in active notika-tab-menu-bg animated fadeIn">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="{{ route('student.result') }}">View result</a>
                                    </li>
                                </ul>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('content')


<div class="row">
        <div class="col-xs-6">
            <div class="dashbard-card">
                 <h4>Pijush Karmakar</h4><br>
                    <p>Test: CSTE-4101 ct-1</p>
                    <p>Batch: Cste-10th</p>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="dashbard-card">
                 <h2 style="color:#148bc5; font-size: 30px">87.5%</h2><br>
                <p>points: 21 of 25</p>
                <p>duration: 00:22:03</p>
                <p>Date started: thu 6 Dec 9:17pm</p>
                <p>Date finished: thu 6 jan 9:40pm</p>
            </div>
        </div>
</div>


 <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="tpgp-ele-tx">
           
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="tpgp-ele-tx">
           
        </div>
    </div>
</div>


@endsection                        