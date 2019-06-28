@extends('teacher_layouts.app') 

@section('title','Create Type')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">ADD New Type</h4>
                 @include('multiauth::message')
                <form action="{{ route('type.store') }}" method="post">
                  @csrf


                    <div class="form-group">
                        <label for="exampleInputEmail1">Type Name</label>
                        <input type="text" name="type_name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>               

                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('type.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection