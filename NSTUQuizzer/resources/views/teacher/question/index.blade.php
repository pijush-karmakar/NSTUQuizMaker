@extends('teacher.layouts.dashboard_app')
@section('title','Question List')

@push('css')

<style type="text/css">
    
.admin-btn{
    /*margin: -12px 0;*/
}
.text-secondary,.text-danger{
    font-size: 19px;
}
.row.padd-3 {
    padding: 50px 0;
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

                            <li><a data-toggle="tab" href="#Courses"><i class="fa fa-file"></i> My courses</a>
                            </li>
                            <li class="active"><a data-toggle="tab" href="#Questions"><i class="fa fa-files-o"></i> Questions</a>
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
                            <div id="Courses" class="tab-pane notika-tab-menu-bg animated fadeIn">
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

                            <div id="Questions" class="tab-pane in active notika-tab-menu-bg animated fadeIn">
                                <ul class="notika-main-menu-dropdown">
                                    <li><a href="{{ route('question.index') }}">Question bank</a>
                                    </li>
                                    <li><a href="{{ route('question.create') }}">Add question</a>
                                    </li>
                                    <li><a href="{{ route('type.index') }}">Question types</a>
                                    </li><li><a href="{{ route('choice.create') }}">Question choices</a>
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
                        <h2>Question Bank</h2>
                        <p>Question list , Add & Edit question</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                      <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('question.create')}}" >Add New Question</a>
                </div>
            </div>
        </div>



<div class="row padd-3">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="nk-int-mk sl-dp-mn">
            <h2>Course Topic</h2>
        </div>
        <div class="bootstrap-select fm-cmp-mg">
            <select class="selectpicker">
                    <option>---Select---</option>
                    @foreach ($topics as $topic)
<option value="{{ $topic->id }}">{{ $topic->topic_name }}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
            <h2>Question Type</h2>
        </div>
        <div class="bootstrap-select fm-cmp-mg">
            <select class="selectpicker" data-live-search="true">
                    <option>---Select---</option>
                    @foreach ($qsn_types as $qsn_type)
           <option value="{{ $qsn_type->id }}">{{ $qsn_type->qsn_type_name }}</option>
                    @endforeach
                </select>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">
            <h2></h2>
        </div>
        <div class="form-example-int">
            <button class="btn btn-success notika-btn-success waves-effect">Filter</button>
        </div>
    </div>

</div>


<div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
            {{-- <div class="data-table-list">

                <div class="basic-tb-hd">
                    <h2></h2> 
                </div>
       

                <div class="table-responsive">
                      <table id="data-table-basic" class="table table-striped">
                        <thead>
                            <tr>            
                                <th>Test Name</th>
                                <th>Course Title</th>
                                <th>Topic Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                 @foreach ($topics as $topic)
                    
                    <tr>
                        <td>
                            @foreach($tests as $test)
                            @if($test->id == $topic->test_id)
                                {{ $test->test_name }}
                            @endif
                            @endforeach
                        </td>

                       <td>
                            @foreach($courses as $course)
                            @if($course->id == $topic->course_id)
                                {{ $course->title }}
                            @endif
                            @endforeach
                        </td>

                        <td>{{ $topic->topic_name }}</td>

                        <td>
                            <ul class="d-flex justify-content-center">
                                <li class="mr-3"><a href="{{route('topic.edit',[$topic->id])}}" class="text-secondary"><i class="notika-icon notika-edit"></i></a></li>

                                <li class="mr-3"><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $topic->id }}').submit();" ><i class="notika-icon notika-trash"></i></a></li>

                    <form id="delete-form-{{ $topic->id }}" action="{{ route('topic.destroy',$topic->id) }}" method="POST" style="display: none;">
                        @csrf @method('delete')
                    </form>

                            </ul>
                        </td>
                    </tr>

                @endforeach 

                <tr>
                    @if($topics->count()==0)
                   <td>No topic is available or created Yet...</td>
                    @endif
                </tr>                                    

            </tbody>

                    </table>

                </div>
            </div> --}}
@foreach ($questions as $question)
<div class="panel panel-collapse notika-accrodion-cus">

     

    <div class="panel-heading" role="tab">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordionGreen" href="#{{ $question->id }}" aria-expanded="false" class="collapsed">
                     {{ $question->qsn_title }}
            </a>
        </h4>
    </div>

    <div id="{{ $question->id }}" class="collapse" role="tabpanel" aria-expanded="false" style="height: 0px;">
        <div class="panel-body">
          <span style="padding: 0px 20px;">for update and delete question follow the link: </span>
            <a href="{{ route('question.edit',$question->id) }}" class="btn btn-info notika-btn-info waves-effect btn-xs">Edit</a>
            <a href="{{ route('question.destroy',$question->id) }}" class="btn btn-danger notika-btn-info waves-effect btn-xs">Delete</a>
        </div>
    </div>

    

</div>
@endforeach



    </div>
    
</div>


</div>





@endsection

@push('js')
  



@endpush