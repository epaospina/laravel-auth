@extends('adminlte::page')
@section('content')
    <div class="accordion" id="accordionExample">
        <div class="container">
            @foreach ($customers as $key => $client)
                @include('clients.collapse_customers')
            @endforeach
        </div>
    </div>
@endsection
