@extends('vendor.layouts.app')

@section('title','All Teachers')

@push('css')
 
 
 
@endpush

@section('content')
<!-- Admin Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">Teacher List</h4>
                                @include('multiauth::message')
                                <div class="data-tables">
                                    {{-- <div class="table-responsive"> --}}
                                        <table id="dataTable" class="text-center">
                                            <thead class="bg-light text-capitalize">
                                                <tr>
                                                    <th>Teacher Name</th>
                                                    <th>Designation</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                        
                         @foreach ($teachers as $key=>$teacher)
                            
                            <tr>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->designation }}</td>
                                <td>{{ $teacher->email }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $teacher->id }}').submit();"><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $teacher->id }}" action="{{ route('teacher.delete',[$teacher->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>


                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                           
                        @if($teachers->count()==0)
                        <tr><td><p>No teachers is available or created Yet...</p></td></tr>
                        @endif                      

                    </tbody>
                                        </table>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- Admin Table end -->
 
                    

@endsection

@push('js')
  



@endpush