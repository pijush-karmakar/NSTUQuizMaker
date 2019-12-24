@extends('vendor.layouts.app') 

@section('title','Create Department')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">ADD New Department</h4>
                 @include('multiauth::message')
                <form action="{{ route('department.store') }}" method="post">
                  @csrf

                    <div class="form-group {{ $errors->has('faculties') ? 'focused error' : '' }}">
                        <label class="col-form-label">Select Faculty</label>
                        <select class="form-control" name="faculty">
                             
                          @foreach($faculties as $faculty)
                             <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Dept. Short Title</label>
                        <input type="text" name="short_name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('department.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection