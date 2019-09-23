@foreach($infoArray['information_car'] as $key => $infoCar)
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="heading{{$key}}">
                <h2 class="mb-0">
                    <button class="btn btn-light collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                        Orden de carga coche #{{$key + 1}}
                    </button>
                </h2>
            </div>
            <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
                <div class="card-body">
                    @include('load-orders.form-order')
                </div>
            </div>
        </div>
    </div>
@endforeach
