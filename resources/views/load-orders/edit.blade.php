@extends('adminlte::page')
@section('content')
    {{--@each('load-orders.information-content', $infoArray['information_car'], 'infoCar')--}}
    @include('load-orders.information-content', ['edit' => true])
@endsection
@push('js')
    <script src="{{asset('js/clients.js')}}"></script>
@endpush
