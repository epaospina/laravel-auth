<style>
    .color-red{
        color: red;
        font-weight: 700;
    }
</style>
@foreach($infoArray['information_car'] as $key => $infoCar)
    @php(dd($infoArray))
    <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
        <div class="card-body">
            @include('load-orders.form-order')
        </div>
    </div>
@endforeach
