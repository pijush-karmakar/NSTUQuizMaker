@extends('teacher_layouts.app') 
@section('title','Type List')

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
                                <h4 class="header-title">Type List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('type.create')}}" >Add New Type</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    
                                                    <th scope="col">Type Name</th>
                                                   
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($types as $type)
                            
                            <tr>
                                

                                <td>{{ $type->type_name }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('type.edit',[$type->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $type->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $type->id }}" action="{{ route('type.destroy',$type->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        <tr>
                            @if($types->count()==0)
                           <td>No types is available or created Yet...</td>
                            @endif
                        </tr>    
                                                

                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Admin Table end -->


@endsection

@push('js')
  



@endpush