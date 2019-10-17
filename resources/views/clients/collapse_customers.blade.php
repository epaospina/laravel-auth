<div class="card">
    <div class="card-header" id="heading{{ $key }}">
        <h2 class="mb-0">
            <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                <span class="num-client"> {{ $i }} </span> - Nombre: {{ $client->signing }} - Ciudad: {{ $client->city_load }}
            </button>
        </h2>
    </div>

    <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
                @foreach($client->loadOrders->where('status', 1) as $loadOrder)
                    @if(isset($loadOrder->bill))
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{$loadOrder->date_upload}}</h5>
                                    <a class="btn btn-success" href="{{ route('load-orders.cmr',$loadOrder->id) }}">CMR</a>
                                    <a class="btn btn-danger" href="{{ route('bills.show-bill-load-order',$loadOrder->id) }}">Facturacion</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
