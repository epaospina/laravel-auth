@extends('adminlte::page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bill.css')}} ">
@endpush
@section('content')
    <div class="header-bill">
        <table>
            <tbody>
            <tr>
                <td colspan="2" class="title-bill"><label>VARIOS</label></td>
            </tr>
            <tr>
                <td><b>Fecha</b></td>
                <td><input name="date" value="{{$date}}"></td>
            </tr>
            <tr>
                <td><b>C.I.F</b></td>
                <td><input name="cif" value="{{$bill->cif}}"></td>
            </tr>
            </tbody>
        </table>

        <table>
            <tbody>
            <tr>
                <td colspan="6"><label>CLIENTE</label></td>
            </tr>
            <tr>
                <td colspan="3"><b>NOMBRE: </b></td>
                <td colspan="3"><input name="name_client" value="{{$bill->name_client}}"></td>
            </tr>
            <tr>
                <td colspan="3"><b>DIRECCION</b></td>
                <td colspan="3"><input name="address_client" value="{{$bill->address_client}}"></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td><b>POBLACION</b>
                    <select>
                        <option value="volvo">PROVINCIA</option>
                        <option value="saab">PAIS</option>
                    </select>
                </td>
                <td colspan="3">
                    <input maxlength="120" name="city_client" class="input-td-city" value="{{$bill->city_client}}">
                    <input maxlength="120" name="department" class="input-td-city" value="{{$bill->department}}">
                </td>
                <td><b>CP</b></td>
                <td><input maxlength="8" name="postal_cod_client" class="input-td-cp" value="{{$bill->postal_cod_client}}"></td>
            </tr>
            <tr>
                <td><b>TELEFONO</b></td>
                <td colspan="5">{{--{{$loadPrder->customer->phone_load}} - {{$loadPrder->customer->mobile_load}}--}}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="body-bill">
        <table class="table-body">
            <tbody>
            <tr>
                <td class="td-title"><label>CANTIDAD</label></td>
                <td>&nbsp;</td>
                <td class="td-title"><label>PRECIO UNITARIO</label></td>
                <td class="td-title"><label>TOTAL</label></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="td-title"><label>DESCRIPCION</label></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="unit-td"><input name="quantity_car" value="{{$loadOrder->customer->infoCars->count()}}" disabled></td>
                <td class="td-left"><label>{{$service->nombre}}</label></td>
                <td class="td-right"><input name="unit_price" class="price-td td-right" value="{{$bill->unit_price}} €"></td>
                <td class="td-right"><input name="price" class="price-td td-right" value="{{$bill->price}} €" disabled></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="td-left"><textarea name="description">{{$bill->description}}</textarea></td>
                <td class="td-right">&nbsp;</td>
                <td class="td-right">&nbsp;</td>
            </tr>
            @foreach($loadOrder->customer->infoCars as $infoCar)
                <tr>
                    <td>&nbsp;</td>
                    <td class="td-left">{{$infoCar->model_car}}</td>
                    <td class="td-right">&nbsp;</td>
                    <td class="td-right">&nbsp;</td>
                </tr>
            @endforeach

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="td-title"><label>SUBTOTAL</label></td>
                <td class="td-right td-title">{{$bill->price}} €</td>
            </tr>
            <tr class="show-iva">
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="td-title"><label>IVA 21%</label></td>
                <td class="td-right td-title">{{$bill->iva}} €</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="td-title"><label>TOTAL</label></td>
                <td class="td-right td-title">{{$bill->price + $bill->iva}} €</td>
            </tr>
            </tbody>
        </table>
    </div>


    <div class="footer-bill">
        <table class="table-footer">
            <tbody>
            <tr>
                <td>MEDIO DE PAGO:</td>
                <td>OTRO</td>
            </tr>
            <tr>
                <td>COMENTARIOS:</td>
                <td><textarea name="observations">{{$bill->observations}}</textarea></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="bill-btn">
        <button class="btn btn-danger" id="saveBill"
                onclick="saveBill({{$bill->id}})">
            - FACTURAR - <i class="fas fa-file-invoice"></i>
        </button>
    </div>
@endsection
@push('js')
    <script src="{{asset('js/bill.js')}}"></script>
@endpush
