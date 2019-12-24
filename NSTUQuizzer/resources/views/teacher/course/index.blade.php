@extends('teacher.layouts.dashboard_app')
@section('title','Course List')

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
                        <div id="Home" class="tab-pane  notika-tab-menu-bg animated fadeIn">
                            <ul class="notika-main-menu-dropdown">
                                <li><a href="{{ route('teacher.dashboard') }}">Dashboard</a>
                                </li>
                                <li><a href="#">My info</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Courses" class="tab-pane active notika-tab-menu-bg animated fadeIn">
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
                                <li><a href="{{ route('choice.create') }}">Question Choice</a>
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
                                <li><a href="#">View result</a>
                                </li>
                                <li><a href="#">Publish result</a>
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

@include('multiauth::message')
<div class="form-element-list">

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="breadcomb-wp">
                <div class="breadcomb-icon">
                    <i class="notika-icon notika-form"></i>
                </div>
                <div class="breadcomb-ctn">
                    <h2>Course List</h2>
                    <p>View you course list</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
            <div class="breadcomb-report">
                <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('course.create')}}">Add New
                    Course</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-list">
                <div class="basic-tb-hd">
                    <h2></h2>
                </div>

                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)

                            <tr>
                                <td><strong>{{ $course->course_code }}</strong></td>
                                <td>{{ $course->title }}</td>

                                <td>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse"
                                        data-target="#tab-details-course-{{$course->id}}" aria-expanded="false"
                                        aria-controls="tab-details-course-{{$course->id}}">
                                        Toggle course details
                                    </button>
                                </td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('course.edit',[$course->id])}}"
                                                class="text-secondary"><i class="notika-icon notika-edit"></i></a></li>

                                        <li class="mr-3"><a href="#" class="text-danger"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $course->id }}').submit();"><i
                                                    class="notika-icon notika-trash"></i></a></li>

                                        <form id="delete-form-{{ $course->id }}"
                                            action="{{ route('course.destroy',$course->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf @method('delete')
                                        </form>
                                    </ul>
                                </td>

                            </tr>
                            <tr style="background-color: #e6e6e6;">
                                <td colspan="4" style="padding: 0px;">
                                    <div style="position: relative; padding: 25px 15px 15px 15px; border-bottom: 3px solid #ccc;"
                                        id="tab-details-course-{{$course->id}}" class="collapse">
                                        <div class="tab-top-shadow"></div>

                                        <div class="card card-body">
                                            <div style="">
                                                <h4>Details of {{$course->course_code}}: {{$course->title}}</h4>

                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab"
                                                            href="#course_tests">Tests</a></li>
                                                    <li><a data-toggle="tab" href="#course_topics">Topics</a></li>
                                                    <li><a data-toggle="tab" href="#course_teachers">Course teachers</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content"
                                                    style="border: 1px solid #ddd; border-top: 0px;">
                                                    <div id="course_tests" class="tab-pane fade in active">

                                                        <div class="data-table-list">
                                                            <div class="basic-tb-hd">
                                                                <h2>Tests on {{$course->course_code}}:
                                                                    {{$course->title}}</h2>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table id="data-table-basic"
                                                                    class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Test name</th>
                                                                            <th>Assigned</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach ($course->tests as $test)
                                                                        <tr>
                                                                            <td>{{$test->test_name}}</td>
                                                                            <td>{{$test->assigned_times}}</td>
                                                                            <td>
                                                                                <button class="btn btn-primary"
                                                                                    type="button">
                                                                                    View test assignments
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="course_teachers" class="tab-pane fade">

                                                        <div class="data-table-list">
                                                            <div class="basic-tb-hd">
                                                                <h2>Course teachers of {{$course->course_code}}:
                                                                    {{$course->title}}</h2>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table id="data-table-basic"
                                                                    class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Designation</th>
                                                                            <th>Actions</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($course->teachers as $teacher)
                                                                        <tr>
                                                                            <td>{{$teacher->name}}</td>
                                                                            <td>{{$teacher->designation}}</td>
                                                                            <td>
                                                                                @if($teacher->id !=
                                                                                Auth::guard('teacher')->user()->id)
                                                                                <button class="btn btn-danger"
                                                                                    type="button">
                                                                                    Delete
                                                                                </button>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="course_topics" class="tab-pane fade">
                                                        <div class="data-table-list">
                                                            <div class="basic-tb-hd">
                                                                <h2>Topics of {{$course->course_code}}:
                                                                    {{$course->title}}</h2>
                                                            </div>
                                                           
                                                            <ul>
                                                                @foreach ($course->topics as $topic)
                                                                <li>
                                                                    <div class="topic-item">
                                                                        <div class="topic-item-container">
                                                                            {{ $topic->topic_name }}
                                                                        </div>
                                                                        
                                                                        <a class="topic-item-button btn-danger" href="#">
                                                                            <i class="fa fa-remove" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>

                                                            <br>
                                                            <p style="margin: 0px 0px 5px 0px;"><strong>Add new topic for this course:</strong></p>
                                                            <div class="topic-item">
                                                                <input class="topic-item-textbox">
                                                                    
                                                                </input>
                                                                <div class="topic-item-button btn-success">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hidden">
                                <td></td>
                            </tr>

                            @endforeach

                            <tr>
                                @if($courses->count()==0)
                                <td>No course is available or created Yet...</td>
                                @endif
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>
</div>





@endsection

@push('js')




@endpush
