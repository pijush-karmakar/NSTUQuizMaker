@extends('layouts.app') 
@section('title','Batch List')

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
                                <h4 class="header-title">Batch List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('batch.create')}}" >Add New Batch</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Degree Name</th>
                                                    <th scope="col">Session</th>
                                                    <th scope="col">Session Start</th>
                                                    <th scope="col">Batch Name</th>
                                                    <th scope="col">Number Of Terms</th>
                                                    <th scope="col">Terms Per Year</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($batches as $batch)
                            
                            <tr>
                                <td>{{ $batch->degree->short_title }}</td>
                                <td>{{ $batch->session }}</td>
                                <td>{{ $batch->session_start }}</td>
                                <td>{{ $batch->batch_name }}</td>
                                <td>{{ $batch->number_of_terms }}</td>
                                <td>{{ $batch->terms_per_year }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('batch.edit',[$batch->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $batch->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $batch->id }}" action="{{ route('batch.destroy',$batch->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        @if($batches->count()==0)
                        <tr><td><p>No batch is available or created Yet...</p></td></tr>
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