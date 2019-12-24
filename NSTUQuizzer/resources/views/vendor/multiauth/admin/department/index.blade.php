@extends('vendor.layouts.app') 
@section('title','Department List')

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
                                <h4 class="header-title">Department List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('department.create')}}" >Add New Department</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Faculty Name</th>
                                                    <th scope="col">Department Name</th>
                                                    <th scope="col">Dept. Short Name</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($departments as $department)
                            
                            <tr>
                                <td>{{ $department->faculty->name }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->short_name }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('department.edit',[$department->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $department->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $department->id }}" action="{{ route('department.destroy',$department->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        @if($departments->count()==0)
                        <p>No Department created Yet...</p>
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