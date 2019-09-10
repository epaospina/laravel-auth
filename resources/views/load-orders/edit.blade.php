@extends('adminlte::page')
@section('content')
    @include('load-orders.information-content')

    <button class="btn btn-bitbucket" id="editLoadOrder" onclick="editInputs()">Editar</button>
    <button class="btn btn-bitbucket" id="saveLoadOrder" onclick="updatePost('{{encrypt($infoArray['load_order']['id'])}}')" style="display: none">Guardar</button>
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
