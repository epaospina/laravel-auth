@extends('adminlte::page')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Ciudad</th>
        </tr>

        @foreach ($clients as $client)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $client->signing }}</td>
                <td>{{ $client->city_load }}</td>
                <td>
                    <form action="{{ route('clients.destroy', encrypt($client->id)) }}" method="POST">
                        {{--<a class="btn btn-info" href="{{ route('clients.show',encrypt($client->id)) }}">Show</a>--}}
                        <a class="btn btn-success" href="{{ route('clients.cmr',$client->id) }}">CMR</a>
                        {{--<a class="btn btn-primary" href="{{ route('clients.edit',encrypt($client->id)) }}">Edit</a>--}}

                        @csrf
                        @method('DELETE')
                        {{--<button type="submit" class="btn btn-danger">Delete</button>--}}
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
