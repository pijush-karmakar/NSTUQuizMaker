@extends('student.layouts.app') 
@section('title','Student Login')



@push('css')
  <style type="text/css">

.nav-pills .nav-link{
    border-radius:0;
    line-height: 30px;
}
li.nav-item{
    width: 50%;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    background-color: #8655fc;
    font-size: 17px;
    font-weight: bold;
}
.nav-pills li a{
   font-size: 17px;
   font-weight: bold;
}

    
</style>
 
@endpush



@section('content')

<div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('student.login') }}">
                     @csrf

                     <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('admin.login') }}">Admin Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('student.login') }}" >Student's Area</a>
                                    </li>
                                    
                    </ul>

                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start your Session</p>
                    </div>
                    <div class="login-form-body">

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

                        <label for="exampleInputEmail1">Email address</label>
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

                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember" {{ old( 'remember') ? 'checked' : '' }} >

                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('student.password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{ route('student.register') }}">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection