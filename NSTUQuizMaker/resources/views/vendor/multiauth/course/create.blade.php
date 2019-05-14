@extends('layouts.app') 

@section('title','Create Course')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">ADD New Course</h4>
                 @include('multiauth::message')
                <form action="{{ route('course.store') }}" method="post">
                  @csrf

                    <div class="form-group {{ $errors->has('batches') ? 'focused error' : '' }}">
                        <label class="col-form-label">Select Batch</label>
                        <select class="form-control" name="batch" required="">
                             
                          @foreach($batches as $batch)
                             <option value="{{ $batch->id }}">{{ $batch->batch_name }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('teachers') ? 'focused error' : '' }}">
                        <label class="col-form-label">Select Course Teacher</label>
                        <select class="form-control" name="teacher" required="">
                             
                          @foreach($teachers as $teacher)
                             <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Course Code</label>
                        <input type="text" name="course_code" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Term</label>
                        <input type="text" name="term" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Credit</label>
                        <input  name="credit" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Credit Hour</label>
                        <input name="credit_hours" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Abstract</label>
                        <input type="text" name="abstract" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                     
                    </div>



                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('course.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection