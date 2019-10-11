@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pending.css')}} ">
@endpush
@section('content')
    <div id="app"></div>
    <a class="btn btn-bitbucket" id="pending" onclick="selectCars()">Pendientes</a>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Fecha de carga</th>
            <th>Compañía</th>
            <th></th>
        </tr>

        @foreach ($load_orders as $load_order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>
                    <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapse{{$load_order->id}}" aria-expanded="false" aria-controls="collapse{{$load_order->id}}">
                        {{ $load_order->bill_to }}
                    </button>
                    <div class="collapse" id="collapse{{$load_order->id}}">
                        <div class="card card-body">
                            @foreach($load_order->customer->infoCars as $car)
                                <p class="p-cars-pending"><input type="checkbox" id="car{{$car->id}}" value="{{$car->id}}"> {{$car->model_car}} - {{$car->vin}}</p>
                            @endforeach
                        </div>
                    </div>
                </td>
                <td>{{ $load_order->date_upload }}</td>
                <td>{{ $load_order->import_company }}</td>
                <td>
                    <form action="{{ route('load-orders.destroy', md5($load_order->id)) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('load-orders.show',md5($load_order->id)) }}">Ver detalle</a>

                        <a class="btn btn-primary" href="{{ route('load-orders.edit',md5($load_order->id)) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
@push('js')
    <script src="{{asset('js/loadOrders.js')}}"></script>
@endpush
