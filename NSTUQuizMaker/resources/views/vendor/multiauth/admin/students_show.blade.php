@extends('layouts.app')
@section('title','Students')
@push('css')

<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />

<style type="text/css">

.space{
margin-right: 10px;
}
span.deg_bat {
font-weight: normal;
font-size: 16px;
padding-left: 20px
}
</style>

@endpush
@section('content')
<!-- Admin Table start -->

<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      <h2 class="header-title float-left">Student List : </h2>
      @if(count($students) > 0 )
      <span class="deg_bat">
        Degree :
        {{-- @if(count($students) > 0 ) --}}
        @foreach ($students as $student)
        @foreach($degrees as $degree)
        @if($degree->id == $student->degree_id)
        {{ $degree->short_title }}
        @endif
        @endforeach
        @break($loop->first)
        @endforeach
        {{-- @endif --}}
      </span>
      <span class="deg_bat">Sesssion :
        {{-- @if(count($students) > 0) --}}
        @foreach ($students as $student)
        @foreach($batches as $batch)
        @if($batch->id == $student->batch_id)
        {{ $batch->session }}
        @endif
        @endforeach
        @break($loop->first)
        @endforeach
        {{-- @endif --}}
      </span>
      @else
      <span class="deg_bat">Student's not available</span>
      @endif
      
      <ul class="float-right space">
        <li><a href="#" class="btn btn-info btn-xs" onclick="event.preventDefault(); document.getElementById('codeall').submit();">Create Code For All</a></li>
        <form id="codeall" action="{{ route('student.codeall') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
      
      <ul class="float-right space">
        <li><a href="#" class="btn btn-info btn-xs" onclick="event.preventDefault(); document.getElementById('mail').submit();">Send Mail to All</a></li>
        <form id="mail" action="" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
      
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
                <th>Create Code</th>
                <th>Send Mail</th>
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
                <td>
                  @if($student->is_registered== true)
                  <span class="status-p bg-success">registered
                  </span>
                  @else
                  <span class="status-p bg-warning">pending
                  </span>
                  @endif
                </td>
                <td>
                  @if($student->is_active== true)
                  <span class="status-p bg-success">Active
                  </span>
                  @else
                  <span class="status-p bg-warning">Disable
                  </span>
                  @endif
                </td>
                <td>{{  $student->registration_code }}</td>
                <td>
                  <ul class="d-flex justify-content-center">
                    {{-- {{  Form::open(array('action' => array('StudentController@code', $student->id), 'id'=>'ajax')) }}
                    @csrf
                    <input type="submit" value="Create"> --}}
                    {{--  <form  id="ajax" auction="{{ $student->id }}"  action="{{ route('student.code') }}" method="POST">
                      @csrf
                      <input type="submit" name="ajax" value="Create">
                    </form> --}}
                    {{-- {{  Form::close() }} --}}
                    
                    <li><a href="#" class="btn btn-create-regcode btn-info btn-xs" data-id="{{$student->id}}">Create</a>
                    </li>                    
                  </ul>
                </td>
                <td>
                  <ul class="d-flex justify-content-center">
                    <li><a href="#" class="btn btn-mail_regcode btn-info btn-xs">Mail</a>
                    </li>                 
                  </ul>
                </td>
                
                <td>
                  <ul class="d-flex justify-content-center">
                    <li class="mr-3"><a href="{{route('student.edit',[$student->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                    <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();"><i class="ti-trash"></i></a></li>
                    <form id="delete-form-{{ $student->id }}" action="{{ route('student.delete',[$student->id]) }}" method="POST" style="display: none;">
                      @csrf @method('delete')
                    </form>
                  </ul>
                </td>
              </tr>
              @endforeach
              
              @if($students->count()==0)
              <tr><td><p>No students is available or created yet...</p></td></tr>
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

  $('.btn-create-regcode').click(function (e){
  var std_id =$(this).attr('data-id');
  
    $.ajax({
        url: "{{ route('student.create_regcode') }}?std_id=" + std_id,
        method: 'POST',
        success: function(response) {                  
          if(response.success)
          {
            alert(response.reg_code);
          }
          else
          {
            //Show error
          }
        }
    });
});
});
</script>


@endpush