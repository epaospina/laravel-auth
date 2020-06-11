@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    @include('users.form')
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
