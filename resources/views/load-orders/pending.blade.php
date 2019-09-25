@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pending.css')}} ">
@endpush
@section('content')
    <div id="app">
        <pending-order-component cars_pending_id="{{$carsPending->id}}"></pending-order-component>
    </div>
@endsection
