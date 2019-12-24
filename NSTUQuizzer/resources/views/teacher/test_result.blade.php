@extends('teacher.layouts.dashboard_app')
@section('title','result')

@push('css')

<style type="text/css">
    .admin-btn {
        /*margin: -12px 0;*/
    }

    .text-secondary,
    .text-danger {
        font-size: 19px;
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
                            <li><a data-toggle="collapse" data-target="#mb_courses" href="#">My courses</a>
                                <ul id="mb_courses" class="collapse dropdown-header-top">
                                    <li><a href="#">All courses</a></li>
                                    <li><a href="#">Add course</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#mb_questions" href="#">Questions</a>
                                <ul id="mb_questions" class="collapse dropdown-header-top">
                                    <li><a href="#">Question bank</a></li>
                                    <li><a href="#">Add question</a></li>
                                    <li><a href="#">Question type</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#mb_tests" href="#">Tests</a>
                                <ul id="mb_tests" class="collapse dropdown-header-top">
                                    <li><a href="#">All tests</a></li>
                                    <li><a href="#">Create new test</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#mb_results" href="#">Results</a>
                                <ul id="mb_results" class="collapse dropdown-header-top">
                                    <li><a href="#">View result</a></li>
                                    <li><a href="#">Publish result</a></li>
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


                        <li><a data-toggle="tab" href="#Home"><i class="fa fa-home"></i> Home</a>
                        </li>

                        <li class="active"><a data-toggle="tab" href="#Courses"><i class="fa fa-file"></i> My
                                courses</a>
                        </li>
                        <li><a data-toggle="tab" href="#Questions"><i class="fa fa-files-o"></i> Questions</a>
                        </li>
                        <li><a data-toggle="tab" href="#Tests"><i class="fa fa-folder"></i> Tests</a>
                        </li>
                        <li><a data-toggle="tab" href="#Results"><i class="fa fa-bar-chart"></i> Results</a>

                        </li>
                    </ul>

                    <div class="tab-content custom-menu-content">
                        <div id="Home" class="tab-pane notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('teacher.dashboard') }}">Dashboard</a>
                                </li>
                                <li><a href="#">My info</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Courses" class="tab-pane in active notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('course.index') }}">All courses</a>
                                </li>
                                <li><a href="{{ route('course.create') }}">Create new course</a>
                                </li>

                                </li>
                                <li><a href="{{ route('topic.index') }}">Topics</a>
                                </li>
                            </ul>
                        </div>

                        <div id="Questions" class="tab-pane notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('question.index') }}">Question bank</a>
                                </li>
                                <li><a href="{{ route('question.create') }}">Add question</a>
                                </li>
                                <li><a href="{{ route('type.index') }}">Question types</a>
                                </li>
                                <li><a href="{{ route('choice.create') }}">Question choices</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tests" class="tab-pane notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('test.index') }}">All tests</a>
                                </li>
                                <li><a href="{{ route('test.create') }}">Create new test</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Results" class="tab-pane notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('teacher.test_result') }}">View result</a>
                                </li>
                                {{-- <li><a href="#">Publish result</a>
                                </li> --}}
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


                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Percentage</th>
                                        <th>Score</th>
                                        <th>Duration</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pijush Karmakar</td>
                                        <td>87%</td>
                                        <td>22</td>
                                        <td>00:29:45</td>
                                        <td>sat, 27 Apr</td>
                                    </tr>

                                        <td>mohammad Forhad</td>
                                        <td>77%</td>
                                        <td>19</td>
                                        <td>00:22:45</td>
                                        <td>sat, 27 Apr</td>
                                    </tr>

                                        <td>Ruhul amin</td>
                                        <td>67%</td>
                                        <td>17</td>
                                        <td>00:24:45</td>
                                        <td>sat, 27 Apr</td>
                                    </tr>

                                        <td>Sm Mahdi</td>
                                        <td>87%</td>
                                        <td>22</td>
                                        <td>00:29:45</td>
                                        <td>sat, 27 Apr</td>
                                    </tr>

                                    </tr>

                                        <td>Md Asad</td>
                                        <td>87%</td>
                                        <td>22</td>
                                        <td>00:29:45</td>
                                        <td>sat, 27 Apr</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

@endsection
