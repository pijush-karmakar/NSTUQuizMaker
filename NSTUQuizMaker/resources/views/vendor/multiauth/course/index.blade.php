@extends('layouts.app') 
@section('title','Course List')

@push('css')

<style type="text/css">
    
.admin-btn{
    margin: -12px 0;
}
.text-secondary,.text-danger{
    font-size: 19px;
}

</style>

@endpush

@section('content')


<!-- Admin Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">Course List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('course.create')}}" >Add New Course</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="data-tables">
                                    {{-- <div class="table-responsive"> --}}
                                        <table id="dataTable" class="text-center">
                                            <thead class="bg-light text-capitalize">
                                                <tr>
                                                    <th>Batch Name</th>
                                                    <th>Course Teacher</th>
                                                    <th>Course Code</th>
                                                    <th>Title</th>
                                                    <th>Term</th>
                                                    <th>Credit</th>
                                                    <th>Credit Hour</th>
                                                    <th>Abstract</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($courses as $course)
                            
                            <tr>
                                <td>
                                    @foreach($batches as $batch)
                                    @if($batch->id == $course->batch_id)
                                        {{ $batch->batch_name }}
                                    @endif
                                    @endforeach
                                </td>

                                <td>
                                    @foreach($teachers as $teacher)
                                    @if($teacher->id == $course->teacher_id)
                                        {{ $teacher->name }}
                                    @endif
                                    @endforeach
                                </td>

                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->term }}</td>
                                <td>{{ $course->credit }}</td>
                                <td>{{ $course->credit_hours }}</td>
                                <td>{{ $course->abstract }}</td>
                                <td>{{ $course->description }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('course.edit',[$course->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $course->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $course->id }}" action="{{ route('course.destroy',$course->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        <tr>
                            @if($courses->count()==0)
                           <td>No course is available or created Yet...</td>
                            @endif
                        </tr>                                    

                    </tbody>

                    
                                        </table>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Admin Table end -->


@endsection

@push('js')
  



@endpush