@extends('layouts.app') 

@section('title','Edit Course')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                
                 @include('multiauth::message')
                <form action="{{ route('course.update',$course->id) }}" method="post">
                  @csrf
                  @method('PUT')

                    <div class="form-group">
                        <label class="col-form-label">Select Batch</label>
                        <select class="form-control" name="batch" >
                          @foreach($batches as $batch)
                             <option {{ $batch->id == $course->batch_id ? 'selected' : '' }} value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Course Teacher</label>
                        <select class="form-control" name="teacher" >
                          @foreach($teachers as $teacher)
                             <option {{ $teacher->id == $course->teacher_id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Code</label>
                        <input type="text" name="course_code" class="form-control" id="exampleInputEmail1" required value="{{ $course->course_code  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" required value="{{ $course->title  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Term</label>
                        <input type="text" name="term" class="form-control" id="exampleInputEmail1" required value="{{ $course->term  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Credit</label>
                        <input  name="credit" class="form-control" id="exampleInputEmail1" required value="{{ $course->credit  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Credit Hour</label>
                        <input name="credit_hours" class="form-control" id="exampleInputEmail1" required value="{{ $course->credit_hours  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Abstract</label>
                        <input type="text" name="abstract" class="form-control" id="exampleInputEmail1" required value="{{ $course->abstract  }}">
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
                     
                    </div>



                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('course.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection