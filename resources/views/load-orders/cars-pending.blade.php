@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pending.css')}} ">
@endpush
@section('content')
    <div id="app">
        <table-cars-pending></table-cars-pending>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/loadOrders.js')}}"></script>
@endpush
