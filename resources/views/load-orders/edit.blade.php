@extends('adminlte::page')
@section('content')
    @include('load-orders.information-content', ['edit' => true])
@endsection
@push('js')
    <script src="{{asset('js/clients-edit.js')}}"></script>
@endpush
