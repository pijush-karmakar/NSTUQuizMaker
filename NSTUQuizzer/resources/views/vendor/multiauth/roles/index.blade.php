@extends('vendor.layouts.app') 
@section('title','Role List')

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


<!-- Roll Table start -->
<div class="col-12 mt-5">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">Role List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{ route('admin.role.create') }}" >Add New Role</a>
                   
                                </h4>
                                 @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Role Name</th>
                                                    <th scope="col">Admin No</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                          @foreach ($roles as $role)
                            
                            <tr>
                                <td>{{ $role->name }}</td>

                                <td>

                                    <span class="status-p bg-primary">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}
                                    </span>

                                </td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{ route('admin.role.edit',$role->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                    @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Roll Table end -->
                    


@endsection