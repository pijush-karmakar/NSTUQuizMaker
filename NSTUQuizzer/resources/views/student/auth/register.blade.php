@extends('student.layouts.app')
@section('title','Student Register')

@section('content')


<div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('student.register') }}">
                     @csrf

                    <div class="login-form-head">
                        <h4>Register Student</h4>
                        <p>Hello there, register and start your Session</p>
                    </div>
                    <div class="login-form-body">

                        @if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $errors->first('name') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span class="fa fa-times"></span>
                                </button>
                             </div> 
                        @endif

                        @if ($errors->has('email'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $errors->first('email') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span class="fa fa-times"></span>
                                </button>
                             </div> 
                        @endif

                        @if ($errors->has('password'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $errors->first('password') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span class="fa fa-times"></span>
                                </button>
                             </div> 
                        @endif

                        <label for="exampleInputEmail1">Name</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" id="exampleInputEmail1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus >
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputEmail1">Student ID</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" id="exampleInputEmail1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('name') }}"   autofocus >
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputEmail1">Roll</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" id="exampleInputEmail1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="roll" value="{{ old('name') }}"   autofocus >
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputEmail1">Registration Code</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" id="exampleInputEmail1" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="reg_code" value="{{ old('name') }}"   autofocus >
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputEmail1">Session</label>
                        <div class="input-group mb-3">
                            
                           <select class="form-control" name="degree">
                             <option value="">---Select---</option>
                            
                           </select>
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputEmail1">Degree</label>
                    <div class="input-group mb-3">
                            
                        <select class="form-control" name="degree">
                             <option value="">---Select---</option>
                            
                        </select>
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                             </div>
                    </div>

                        <label for="exampleInputEmail1">E-Mail Address</label>
                        <div class="input-group mb-3">
                            
                            <input type="email" id="exampleInputEmail1" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  required >
                             
                             <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-email"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group mb-3">
                            
                            <input type="password" id="exampleInputPassword1" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                             </div>
                        </div>

                        <label for="exampleInputPassword1">Confirm Password</label>
                        <div class="input-group mb-3">
                            
                        <input type="password" id="exampleInputPassword1" class="form-control" name="password_confirmation" required >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                            </div>
                        </div>

                       
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        

                    </div>
                </form>
            </div>
        </div>




@endsection
