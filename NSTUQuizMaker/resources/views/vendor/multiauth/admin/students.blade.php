@extends('layouts.app')

@section('title','All Students')

@push('css')
 
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
 
@endpush

@section('content')
<!-- Admin Table start -->
          <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <p class="">Select Degreee and Session to view students</p>
                        <form method="POST" action="{{ route('student.show') }}">{{ csrf_field() }}
                            <div class="form-row align-items-center">
                                <div class="form-group col-sm-3 my-1">
                                    
                                    <select class="form-control" name="degree">
                                         
                                      @foreach($degrees as $degree)
                                         <option value="{{ $degree->id }}">{{ $degree->short_title }}</option>
                                      @endforeach
                                        
                                    </select>
                                </div>

                    <div class="form-group col-sm-3 my-1">
                        
                        <select class="form-control" name="batch" required="">
                             
                          @foreach($batches as $batch)
                             <option value="{{ $batch->id }}">{{ $batch->session }}</option>
                          @endforeach
                            
                        </select>
                    </div>
                                
                                <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary">Show student List</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

 @isset($students)
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Student List</h4>
                                @include('multiauth::message')
                                <div class="data-tables table-responsive text-nowrap">
                                    {{-- <div class="table-responsive"> --}}
                                        <table id="example" class="text-center">
                                            <thead class="bg-light text-capitalize">
                                                <tr>
                                                    <th></th>
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Roll</th>
                                                    <th>Session</th>
                                                    <th>Degree</th>
                                                    <th>Email</th>
                                                    <th>Registered</th>
                                                    <th>Status</th>
                                                    <th>Code</th>
                                                    <th>Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                        
                         @foreach ($students as $student)
                            
                            <tr>
                                <td></td>
                                <td>{{ $student->student_id }}</td>

                                <td>{{ $student->name }}</td>
                                <td>{{ $student->roll }}</td>

                                <td>
                                    @foreach($batches as $batch)
                                    @if($batch->id == $student->batch_id)
                                        {{ $batch->session }}
                                    @endif
                                    @endforeach
                                </td>

                                <td>
                                    @foreach($degrees as $degree)
                                    @if($degree->id == $student->degree_id)
                                        {{ $degree->short_title }}
                                    @endif
                                    @endforeach
                                </td>

                                <td>{{ $student->email }}</td>
                                <td>{{ $student->is_registered }}</td>
                                <td>{{ $student->is_active }}</td>
                                <td>{{ $student->registration_code }}</td>

                                

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

                           
                        @if($students->count()==0)
                        <tr><td><p>No students is available or created Yet...</p></td></tr>
                        @endif                     

                    </tbody>
                                        </table>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset    
        <!-- Admin Table end -->
 
                    

@endsection

@push('js')

<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script type="text/javascript">

$(document).ready(function (){
   var table = $('#example').DataTable({
     
      'columnDefs': [
         {
            'orderable': false,
            'className': 'select-checkbox',
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi',
         'selector': 'td:first-child'
      },
      'order': [[1, 'asc']]
   });



   // Handle form submission event

});

</script>


@endpush