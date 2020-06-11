@extends('adminlte::page')
@section('content')
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>rol</th>
            <th>updated_at</th>
            <th></th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles[0]->name }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

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
