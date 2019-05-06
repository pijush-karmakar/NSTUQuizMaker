@extends('layouts.app')

@section('title','All Students')

@push('css')
 
 
 
@endpush

@section('content')
<!-- Admin Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">Student List</h4>
                                @include('multiauth::message')
                                <div class="data-tables">
                                    {{-- <div class="table-responsive"> --}}
                                        <table id="dataTable" class="text-center">
                                            <thead class="bg-light text-capitalize">
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Email</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                        
                         @foreach ($students as $key=>$student)
                            
                            <tr>
                                <td>{{ $student->name }}</td>

                                <td>{{ $student->email }}</td>

                                <td>
                                    Active

                                </td>

                                <td>
                                    <ul class="d-flex justify-content-center">

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();"><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $student->id }}" action="{{ route('student.delete',[$student->id]) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>


                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                           
                                                

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