@extends('student.layouts.dashboard_app')
@section('title','test')

@push('css')

<style type="text/css">
 .col-sm-12.col-md-12.col-sm-12.col-xs-12.pad-qsn {
    padding: 20px;
}

</style>

@endpush


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
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-ctn">
										<p>Duration: 00:30:00</p>
										<p>Remaining time: 00:22:03</p>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>


<div class="card-box">
        <div class="todoapp">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p>The type of systems which are characterized by input and the output quantized at certain levels are called as</p>

				<div class="fm-checkbox">
                    <label><input type="checkbox"  class="i-checks"> <i></i>a) analog</label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i>b) discrete</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>c) digital</label><br>
                    <label><input type="checkbox"  class="i-checks"> <i></i>d) continuous</label>
                </div>


                </div>

                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> An example of a discrete set of information/system is</p>

                <div class="fm-checkbox">
                    <label><input type="checkbox"  class="i-checks"> <i></i>a) the trajectory of the Sun</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i> b) data on a CD</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>c) universe time scale</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>d) movement of water through a pipe</label>
                </div>

                </div>

                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> An example of a discrete set of information/system is</p>

				<div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i>a) the trajectory of the Sun</label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i> b) data on a CD</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>c) universe time scale</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>d) movement of water through a pipe</label>
                </div>

                </div>

                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> A system which is linear is said to obey the rules of</p>

				<div class="fm-checkbox">
                 <label><input type="checkbox" class="i-checks"> <i></i>a) scaling</label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i>b) additivity</label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i> c) both scaling and additivity </label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i>d) homogeneity</label>
                </div>


                </div>

                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> An example of a discrete set of information/system is</p>

                <div class="fm-checkbox">
                    <label><input type="checkbox"  class="i-checks"> <i></i>a) True</label>

                    <label><input type="checkbox"  class="i-checks"> <i></i> b) False</label>
                </div>

                </div>




                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> An example of a discrete set of information/system is</p>

				<div class="fm-checkbox">
                    <label><input type="checkbox"  class="i-checks"> <i></i>a) the trajectory of the Sun</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i> b) data on a CD</label><br>

                    <label><input type="checkbox"  class="i-checks"> <i></i>c) universe time scale</label><br>

                    <label><input type="checkbox" class="i-checks"> <i></i>d) movement of water through a pipe</label>
                </div>

                </div>


                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 pad-qsn">
                    <p> An example of a discrete set of information/system is</p>

                <div class="fm-checkbox">
                    <label><input type="checkbox"  class="i-checks"> <i></i>a) True</label>

                    <label><input type="checkbox"  class="i-checks"> <i></i> b) False</label>
                </div>

                </div>




<div>
	<p><a class="btn btn-success" style="margin-left:20px" href="{{ route('student.result') }}">Submit</a></p>
</div>


            </div>
            
        </div>
</div> 



@endsection                        