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
      <div style="height: 50px;">
        <h4 class="float-left">Student list of {{$degree->short_title}} {{$batch->session}} session</h4>
        @if(count($students) > 0 )     
          <ul>            
            <li class="float-right "><a href="#" id="btn-send-mail-to-selected" class="btn btn-info btn-xs">Send mail to selected</a></li> 
            <li class="float-right space"><a href="#" id="btn-create-regcode-for-selected" class="btn btn-info btn-xs">Create code for selected</a></li>       
          </ul>
        @endif
      </div>

      @if(count($students) > 0 )
        <div class="data-tables table-responsive text-nowrap">
          {{-- <div class="table-responsive"> --}}
            <table id="student-list" class="text-center">
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
                  <td class="td-std-id">{{ $student->student_id }}</td>
                  <td class="td-std-name">{{ $student->name }}</td>
                  <td class="td-std-roll">{{ $student->roll }}</td>
                  <td class="td-std_session">                  
                    {{ $batch->session }}
                  </td>
                  <td class="td-std-degree">               
                    {{ $degree->short_title }}
                  </td>
                  
                  <td class="td-std-email">{{ $student->email }}</td>
                  <td class="td-std-reg-status">
                    @if($student->is_registered== true)
                    <span class="status-p bg-success">registered
                    </span>
                    @else
                    <span class="status-p bg-warning">pending
                    </span>
                    @endif
                  </td>
                  <td class="td-std-status">
                    @if($student->is_active== true)
                    <span class="status-p bg-success">Active
                    </span>
                    @else
                    <span class="status-p bg-warning">Disabled
                    </span>
                    @endif
                  </td>
                  <td class="td-std-regcode">
                    <span class="std-regcode" style="font-family:monospace">{{  $student->registration_code }}</span>
                  </td>
                  <td class="td-btn-regcode">
                    <a href="#" class="btn btn-create-regcode btn-info btn-xs" data-std-id="{{$student->id}}" data-std-name="{{$student->name}}" data-std-email="{{$student->email}}">Create</a>                    
                  </td>
                  <td class="td-btn-mail-regcode">
                    <a href="#" class="btn btn-mail-regcode btn-info btn-xs" data-std-id="{{$student->id}}">Mail</a>
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
                <tr><td><p>No student record found.</p></td></tr>
                @endif
              </tbody>
            </table>
          {{-- </div> --}}
        </div>
      @else
      <span class="deg_bat">No student records found.</span>
      @endif
    </div>
  </div>

  <div class="modal fade" id="notify-regcode" role="dialog">
    <div class="modal-dialog">  
      <div class="modal-content">
        <div class="modal-header">          
          <h4 class="modal-title" style="text-align: center; margin:auto;">Registration code</h4>
        </div>
        <div class="modal-body">          
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="notify-mail-sent" role="dialog">
    <div class="modal-dialog">          
      <div class="modal-content">
        <div class="modal-header">          
          <h4 class="modal-title" style="text-align: center; margin:auto;">Mail registration code</h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
  var table = $('#student-list').DataTable({
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

  function sendMail(std_id){
    $("#notify-regcode").modal('hide');

    $.ajax({
      url: "{{ route('student.mail_regcode') }}?std_id=" + std_id,
      method: 'GET',
      success: function(response) {                  
        if(response.success)
        {
          //alert("Mail sent");
          $('#notify-mail-sent .modal-dialog .modal-body').html(
            '<div style="text-align: center;"><p>Registration mail sent.</p></div>'
          );
        }
        else
        {
          $('#notify-mail-sent .modal-dialog .modal-body').html(
            '<div style="text-align: center;"><p>Registration mail send failed.</p></div>'
          );
        }

        $("#notify-mail-sent").modal({backdrop: "static"});
      }
    });
  }

  $('.btn-create-regcode').click(function (e){   
    var std_id = $(this).data('std-id');
    var std_name = $(this).data('std-name');
    var std_email = $(this).data('std-email');

    var $reg_code_span = $(this).closest('tr').find('.std-regcode');    

    var modal_body = $("#notify-regcode .modal-dialog .modal-body");
    modal_body.html(
      '<div style="text-align: center;">' +
      '<p style="text-align: center;">Generating registration code for </p>' +
      '<h5>' + std_name + '.</h5>' +
      '<p>Please wait...</p>' +
      '</div>');
    
    $("#notify-regcode").modal({backdrop: "static"});
    $.ajax({
      url: "{{ route('student.create_regcode') }}?std_id=" + std_id,
      method: 'GET',
      success: function(response) {                  
        if(response.success)
        {
          var reg_code = response.reg_code;
          modal_body.html(
          '<div style="text-align: center;">' +
          '<p>Registration code generated for <strong>' + std_name + '</strong></p>' +
          '<h2 style="color:#2070A0; font-family:monospace; line-height:2">' + reg_code + '</h2><br>' +          
          '<p>Email registration code to <strong>' + std_email + '</strong>?</p><br>' + 
          '<a href="#" class="btn btn-mail-regcode btn-info btn-xs" data-std-id = "' + std_id + '">Mail now</a>' +
          '<a style="margin-left:10px;" class="btn btn-default btn-xs" data-dismiss="modal">Close</a>' +
          '</div>' 
          );

          $reg_code_span.html(reg_code);
        }
        else
        {
          modal_body.html('<p style="text-align: center;">Failed to generate registration code for <br><h5>' + std_name + '.</h5><br> Please try again...</p>');
          $("#notify-regcode .modal-dialog .modal-footer").removeClass('d-none');
        }
      }
    });
  });

  $('.btn-mail-regcode').on('click', function (e){   
    var std_id = $(this).data('std-id');
    sendMail(std_id);
  });

  $('#notify-regcode').on('click', '.btn-mail-regcode', function(e){
    var std_id = $(this).data('std-id');
    sendMail(std_id);
  });

});
</script>


@endpush