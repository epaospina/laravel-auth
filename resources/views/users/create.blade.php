@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/clients.css')}} ">
@endpush
@section('content')
    <form id="regForm" action="{{ route('load-orders.store') }}" method="POST">
        @csrf

    </form>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush

