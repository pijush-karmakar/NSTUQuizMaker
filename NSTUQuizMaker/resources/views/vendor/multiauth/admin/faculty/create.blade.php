@extends('layouts.app') 

@section('title','Create Faculty')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">ADD New Faculty</h4>
                 @include('multiauth::message')
                <form action="{{ route('faculty.store') }}" method="post">
                  @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">Faculty Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('faculty.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection