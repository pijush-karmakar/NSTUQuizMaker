@extends('vendor.layouts.app') 
@section('title','Degree List')

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
                                <h4 class="header-title">Degree List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('degree.create')}}" >Add New Degree</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Degree Name</th>
                                                    <th scope="col">Dept</th>
                                                    <th scope="col">Degree full title</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($degrees as $degree)
                            
                            <tr>
                                <td>{{ $degree->short_title }}</td>
                                <td>
                                    @foreach($departments as $department)
                                    @if($department->id == $degree->department_id)
                                        {{ $department->short_name }}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{ $degree->full_title }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('degree.edit',[$degree->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $degree->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $degree->id }}" action="{{ route('degree.destroy',$degree->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        @if($degrees->count()==0)
                        <tr><td><p>No degree is available or created Yet...</p></td></tr>
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