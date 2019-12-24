{{-- @extends('multiauth::layouts.app')  --}}
@extends('vendor.layouts.app') 

@section('content')

    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Update Admin Information</h4>
                 @include('multiauth::message')
                <form action="{{route('admin.update',[$admin->id])}}" method="post">
                   @csrf @method('patch')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $admin->name }}"
                                    required id="name" >
                     
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>
                        <input type="email" class="form-control" name="email" value="{{ $admin->email }}"
                                     id="email" required>
                     
                    </div>

                     <div class="form-group">
                        <label class="col-form-label">Select Department</label>
                        <select class="form-control" name="department_id">
                             
                          @foreach($departments as $department)
                          <option {{ $department->id == $admin->department_id ? 'selected' : '' }}
                              value="{{ $department->id }}">{{ $department->name }}
                          </option>
                          @endforeach
                            
                        </select>
                    </div>

                    
                    <div class="form-group">
                            <label for="role_id" class="col-form-label">Assign Role</label>

                                <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" 
                                        @if (in_array($role->id,$admin->roles->pluck('id')->toArray())) 
                                            selected 
                                        @endif >{{ $role->name }}
                                       </option>
                                    @endforeach
                                </select>

                            @if ($errors->has('role_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span> 
                            @endif
                            
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox ">
                            <input type="checkbox" name="activation"  value="1" {{ $admin->active ? 'checked':'' }} class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5"> Active Admin </label>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                     <a href="{{ route('admin.show') }}" class="btn btn-sm btn-danger float-right">Back</a>

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->

@endsection
