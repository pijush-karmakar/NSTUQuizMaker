@extends('layouts.app') 

@section('title','Edit Degree')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Degree</h4>
                 @include('multiauth::message')
                <form action="{{ route('degree.update',$degree->id) }}" method="post">
                  @csrf
                  @method('PUT')

                    <div class="form-group">
                        <label for="exampleInputEmail1">Degree Name</label>
                        <input type="text" name="short_title" value="{{ $degree->short_title }}" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Degree Full Title</label>
                        <input type="text" name="full_title" value="{{ $degree->full_title }}" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                     <a href="{{ route('degree.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection