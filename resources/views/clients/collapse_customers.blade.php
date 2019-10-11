<div class="card">
    <div class="card-header" id="heading{{ $key }}">
        <h2 class="mb-0">
            <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                <span class="num-client"> {{ $key }} </span> - Nombre: {{ $client->signing }} - Ciudad: {{ $client->city_load }}
            </button>
            {{--<button class="btn btn-danger" type="button">
                ELIMINAR
            </button>--}}
        </h2>
    </div>

    <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
                @foreach($client->loadOrders as $loadOrder)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$loadOrder->date_upload}}</h5>
                                <form action="{{ route('clients.destroy', encrypt($loadOrder->id)) }}" method="POST">
                                    {{--<a class="btn btn-info" href="{{ route('clients.show',encrypt($client->id)) }}">Show</a>--}}
                                    <a class="btn btn-success" href="{{ route('load-orders.cmr',$loadOrder->id) }}">CMR</a>
                                    <a class="btn btn-danger" href="{{ route('bills.show-bill-load-order',$loadOrder->id) }}">Facturacion</a>
                                    {{--<a class="btn btn-primary" href="{{ route('clients.edit',encrypt($client->id)) }}">Edit</a>--}}
                                    @csrf
                                    @method('DELETE')
                                    {{--<button type="submit" class="btn btn-danger">Delete</button>--}}
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
