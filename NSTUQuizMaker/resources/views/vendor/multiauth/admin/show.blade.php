@extends('layouts.app') 
@section('title','Admin List')

@push('css')

<style type="text/css">
    
.admin-btn{
    margin: -12px 0;
}
.text-secondary,.text-danger{
    font-size: 19px;
}

</style>

@endpush

@section('content')



<!-- Admin Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">Admin List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('admin.register')}}" >Add New {{ ucfirst(config('multiauth.prefix')) }}</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Admin Name</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($admins as $admin)
                            
                            <tr>
                                <td>{{ $admin->name }}</td>


                          {{-- <td><select class="form-control" name="department_id">
                             
                          @foreach($departments as $department)
                          <option {{ $department->id == $admin->department_id ? 'selected' : '' }} disabled
                              value="{{ $department->id }}">{{ $department->short_name }}
                          </option>
                          @endforeach
                            
                        </select></td> --}}


                                <td>
                                     @foreach($departments as $department)
                                    @if($department->id == $admin->department_id)
                                        {{ $department->short_name }}
                                    @endif @endforeach
                                </td>
                            
                                

                         @foreach ($admin->roles as $role) 
                                <td>{{ $role->name }}</td>
                         @endforeach

                                <td>
                                    @if($admin->active == true)

                                    <span class="status-p bg-success">Active
                                    </span>

                                    @else

                                    <span class="status-p bg-warning">Disable
                                    </span>

                                    @endif

                                </td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('admin.edit',[$admin->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        @if($admins->count()==0)
                        <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p>
                        @endif    
                                                

                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Admin Table end -->


@endsection