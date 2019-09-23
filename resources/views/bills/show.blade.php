@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bill.css')}} ">
@endpush
@section('content')
    <div id="app">
        <table-bill-component order_id="{{$loadOrder->id}}"></table-bill-component>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/bill.js')}}"></script>
@endpush
