@extends('teacher_layouts.app') 
@section('title','Topic List')

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
                                <h4 class="header-title">Topic List

                        <a class="float-right btn btn-sm btn-success admin-btn" href="{{route('topic.create')}}" >Add New Topic</a>
                   
                                </h4>
                                @include('multiauth::message')
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Topic Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Action</th>
                                                </tr>


                                            </thead>

                    <tbody>
                         @foreach ($topics as $topic)
                            
                            <tr>
                                <td>
                                    @foreach($courses as $course)
                                    @if($course->id == $topic->course_id)
                                        {{ $course->title }}
                                    @endif
                                    @endforeach
                                </td>

                                <td>{{ $topic->name }}</td>
                                <td>{{ $topic->description }}</td>

                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="{{route('topic.edit',[$topic->id])}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                        <li><a href="#" class="text-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $topic->id }}').submit();" ><i class="ti-trash"></i></a></li>

                            <form id="delete-form-{{ $topic->id }}" action="{{ route('topic.destroy',$topic->id) }}" method="POST" style="display: none;">
                                @csrf @method('delete')
                            </form>

                                    </ul>
                                </td>
                            </tr>

                        @endforeach 

                        <tr>
                            @if($topics->count()==0)
                           <td>No topics is available or created Yet...</td>
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