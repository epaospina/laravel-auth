@extends('adminlte::page')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>contact_person</th>
            <th>client_car_id</th>
            <th>date_upload</th>
            <th>buyer</th>
            <th>importing_company</th>
        </tr>

        @foreach ($load_orders as $load_order)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $load_order->contact_person }}</td>
                <td>{{ $load_order->client_car_id }}</td>
                <td>{{ $load_order->date_upload }}</td>
                <td>{{ $load_order->buyer }}</td>
                <td>{{ $load_order->importing_company }}</td>
                <td>
                    <form action="{{ route('load-orders.destroy',$load_order->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('load-orders.show',$load_order->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('load-orders.edit',$load_order->id) }}">Edit</a>

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
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush
