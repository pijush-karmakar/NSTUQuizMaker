@extends('vendor.layouts.app') 
@section('title','Faculty List')

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
                                <h4 class="header-title">Faculty List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('faculty.create')}}" >Add New Faculty</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Faculty Name</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($faculties as $faculty)
                            
                            <tr>
                                <td>{{ $faculty->name }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('faculty.edit',[$faculty->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $faculty->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $faculty->id }}" action="{{ route('faculty.delete',[$faculty->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        @if($faculties->count()==0)
                        <p>No Faculty created Yet...</p>
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