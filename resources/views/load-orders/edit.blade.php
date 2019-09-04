@extends('adminlte::page')
@section('content')
    @include('load-orders.form-order')

    <button id="editLoadOrder" onclick="editInputs()">Editar</button>
    <button id="saveLoadOrder" onclick="updatePost({{$infoArray['load_order']['id']}})" style="display: none">Guardar</button>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
