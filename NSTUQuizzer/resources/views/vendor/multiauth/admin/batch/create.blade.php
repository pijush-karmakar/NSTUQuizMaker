@extends('vendor.layouts.app') 

@section('title','Create Batch')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">ADD New Batch</h4>
                 @include('multiauth::message')
                <form action="{{ route('batch.store') }}" method="post">
                  @csrf

                    <div class="form-group {{ $errors->has('degrees') ? 'focused error' : '' }}">
                        <label class="col-form-label">Select Degree</label>
                        <select class="form-control" name="degree">
                             <option value=""> --Select-- </option>
                          @foreach($degrees as $degree)
                             <option value="{{ $degree->id }}">{{ $degree->short_title }}</option>
                          @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Session</label>
                        <input type="text" name="session" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Session Start</label>
                        <input type="text" name="session_start" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Batch Name</label>
                        <input type="text" name="batch_name" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Number Of Terms</label>
                        <input type="number" name="number_of_terms" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Terms Per Year</label>
                        <input type="number" name="terms_per_year" class="form-control" id="exampleInputEmail1" required>
                     
                    </div>



                    <button type="submit" class="btn btn-primary btn-sm">Store</button>
                     <a href="{{ route('batch.index') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection