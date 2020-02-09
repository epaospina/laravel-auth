@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pending.css')}} ">
@endpush
@section('content')
    <a class="btn btn-bitbucket" id="pending" onclick="selectCars()">Pendientes</a>
    <div id="app">
        <table-load-order></table-load-order>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/loadOrders.js')}}"></script>
@endpush
