@extends('vendor.layouts.app') 

@section('title','Edit Role')


@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Role</h4>
                 @include('multiauth::message')
                <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                  @csrf @method('patch')

                    <div class="form-group">
                        <label for="exampleInputEmail1">Roll Name</label>
                        <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Change</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->


@endsection