@extends('vendor.layouts.app')

@section('title','Dashboard')

@push('css')
  
 
@endpush


@section('content')


<div class="card-body">
    @include('multiauth::message')
    You are logged in to {{ config('multiauth.prefix') }} side!
</div>


@endsection



@push('js')
   
@endpush