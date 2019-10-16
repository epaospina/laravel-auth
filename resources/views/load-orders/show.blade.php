@extends('adminlte::page')
@section('content')
    @include('load-orders.information-content')
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
