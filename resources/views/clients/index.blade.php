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
    <div class="accordion" id="accordionExample">
        <div class="container">
            @foreach ($customers as $key => $client)
                @include('clients.collapse_customers', [$i++])
            @endforeach
        </div>
    </div>
@endsection
