@extends('teacher_layouts.app') 

@section('title','Edit Type')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                 @include('multiauth::message')
                <form action="{{ route('type.update',$type->id) }}" method="post">
                  @csrf @method('PUT')
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type Name</label>
                        <input type="text" name="type_name" class="form-control" id="exampleInputEmail1" required value="{{ $type->type_name }}">
                     
                    </div>               

                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('type.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection