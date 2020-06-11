@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    @if(isset($success))
        <div class="alert alert-info">
            {{$success}}
        </div>
    @endif
    <div id="app">
        <table-bills></table-bills>
    </div>
@endsection
