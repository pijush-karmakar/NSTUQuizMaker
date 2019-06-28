@extends('teacher_layouts.app') 

@section('title','Edit Topic')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                 @include('multiauth::message')
                <form action="{{ route('topic.update',$topic->id) }}" method="post">
                  @csrf @method('PUT')

                    <div class="form-group {{ $errors->has('courses') ? 'focused error' : '' }}">
                        <label class="col-form-label">Select Course</label>
                        <select class="form-control" name="course" required="">
                             
                          @foreach($courses as $course)
                             <option {{ $course->id == $topic->course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->title }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Topics Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" required value="{{ $topic->name }}">
                     
                    </div>               

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="description" class="form-control" required>{{ $topic->description }}</textarea>
                     
                    </div>



                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('topic.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection