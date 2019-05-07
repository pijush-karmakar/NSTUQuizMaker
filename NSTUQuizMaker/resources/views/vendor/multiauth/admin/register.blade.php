@extends('layouts.app') 

@section('title','Register Admin')

@section('content')


    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Register New Admin</h4>
                 @include('multiauth::message')
                <form action="{{ route('admin.register') }}" method="post">
                  @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    required id="name" >
                     
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                     id="email" required>
                     
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }}">
                            <label for="password">Password</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            
                    </div>

                    <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                    </div>

                    <div class="form-group">
                            <label for="phone">Phone No</label>
                                <input id="phone" type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"
                                    required>
                            
                    </div>

                    <div class="form-group">
                            <label for="role_id" class="col-form-label">Assign Role</label>

                                <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            
                    </div>



                    <button type="submit" class="btn btn-primary btn-sm">Register</button>
                     <a href="{{ route('admin.show') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
@endsection