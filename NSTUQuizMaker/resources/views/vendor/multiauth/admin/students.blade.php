@extends('layouts.app')

@section('title','All Students')

@push('css')
 



@endpush

@section('content')
<!-- Admin Table start -->
          <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <p class="">Select Degreee and Session to view students</p>
                        
                        <form method="POST" action="{{ route('student.show') }}" enctype="multipart/form-data">
                          @csrf
                            <div class="form-row align-items-center">
                                  
                                <div class="form-group col-sm-3 my-1">

                            <label for="select_degree">Degree</label>        
                            <select class="form-control" name="degree" id="select_degree">
                                           
                                      @foreach($degrees as  $id => $degree)
                                         <option  value="{{ $id }}">{{ $degree }}</option>
                                      @endforeach

                                        
                                    </select>
                                </div>

                    <div class="form-group col-sm-3 my-1">
                        <label for="select_session">Session</label>
                        <select class="form-control" name="session" id="select_session">
                            
                          {{-- @foreach($batches as $batch) --}}
                             <option  value="">-- select --</option>
                          {{-- @endforeach --}}
                         
                            
                        </select>
                    </div>

                    
                                <div class="form-group col-sm-3 my-1">
                                  <label></label>
                                <div class="col-auto my-1">
                                    <button type="submit" class="btn btn-primary">Show student List</button>
                                </div></div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


{{-- @isset($students)
                   
@endisset   --}}  


<!-- Admin Table end -->
 
                    

@endsection

@push('js')

<script type="text/javascript">
  
 $(document).ready(function (){
  
 $("#select_degree").change(function(){
      $.ajax({
          url: "{{ route('api.get_degree_sessions') }}?degree=" + $(this).val(),
          method: 'GET',
          success: function(data) {                  
            var html = '<option>--Select--</option>';                  
            data.sessions.forEach(s => {
                html += "<option value='" + s.batch_id + "'>" + s.session + "</option><br>";
            });

            $('#select_session').html(html);
          }
      });
  });

 });

</script>


@endpush