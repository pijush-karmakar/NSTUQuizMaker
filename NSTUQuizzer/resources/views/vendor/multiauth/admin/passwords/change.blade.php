@extends('vendor.layouts.app') 

@section('title','Change Password')

@section('content')

 <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Change Admin Password</h4>
                 {{-- @include('multiauth::message') --}}
                <form method="POST" action="{{ route('admin.password.change') }}">
                        @csrf

                    <div class="form-group">
                            <label for="oldPassword" ">Old Password</label>

                                <input id="oldPassword" type="password" class="form-control{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"required > 
                                @if ($errors->has('oldPassword'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                    </span>
                                 @endif
                            
                    </div>

                    <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                 @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                                @endif
                            
                    </div>

                    <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                     

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->










@endsection