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
                            

                            <li  class="active" ><a data-toggle="tab" href="#Home"><i class="fa fa-home"></i> Home</a>
                            </li>

                            
                            </li>
                            <li ><a data-toggle="tab" href="#Results"><i class="fa fa-bar-chart"></i> Results</a>

                            </li>
                        </ul>

                        <div class="tab-content custom-menu-content">
                            <div id="Home" class="tab-pane in active notika-tab-menu-bg animated fadeIn">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="{{ route('student.dashboard') }}">Dashboard</a>
                                    </li> 
                                    <li><a href="#">My info</a>
                                    </li>                                
                                </ul>
                            </div>
                            
                            
                            
                            <div id="Results" class="tab-pane  notika-tab-menu-bg animated fadeIn">
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">

                        
                         <div class="basic-tb-hd">
                             <h2>Student :: Dashboard</h2><br>
                        </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="dashbard-card">
                            <h4>Upcoming tests</h4>
                            <p>No upcoming tests.</p>
                            <p><a class="btn btn-success notika-btn-success waves-effect"  href="{{ route('student.test') }}">View Test Demo</a></p>
                        </div>
                    </div>
                </div>
                <br><br>

                        <div class="basic-tb-hd">
                            <h2>Recent test</h2>
                            <p>view your exam result,score & percentage</p>
                        </div>

                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                        <th>Percentage</th>
                                        <th>Score</th>
                                        <th>Duration</th>
                                        <th>View Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mock test</td>
                                        <td>87%</td>
                                        <td>22</td>
                                        <td>00:29:45</td>
                                        <td><a href="{{ route('student.result') }}" class="btn btn-primary notika-btn-primary btn-sm waves-effect">Result</a></td>
                                    </tr>

                                        <td>CSTE-4101 ct-1</td>
                                        <td>77%</td>
                                        <td>19</td>
                                        <td>00:22:45</td>
                                        <td><a href="{{ route('student.result') }}" class="btn btn-primary notika-btn-primary btn-sm waves-effect">Result</a></td>
                                    </tr>

                                        <td>CSTE-4102 ct-2</td>
                                        <td>67%</td>
                                        <td>17</td>
                                        <td>00:24:45</td>
                                        <td><a href="{{ route('student.result') }}" class="btn btn-primary notika-btn-primary btn-sm waves-effect">Result</a></td>
                                    </tr>

                                        <td>Mock test</td>
                                        <td>87%</td>
                                        <td>22</td>
                                        <td>00:29:45</td>
                                        <td><a href="{{ route('student.result') }}" class="btn btn-primary notika-btn-primary btn-sm waves-effect">Result</a></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection
