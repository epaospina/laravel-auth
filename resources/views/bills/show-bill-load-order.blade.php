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
                <td>10/08/2019</td>
            </tr>
            <tr>
                <td><b>C.I.F</b></td>
                <td>B-02559581</td>
            </tr>
            </tbody>
        </table>

        <table>
            <tbody>
            <tr>
                <td colspan="6"><label>CLIENTE</label></td>
            </tr>
            <tr>
                <td colspan="3"><b>NOMBRE</b></td>
                <td colspan="3">ALBAMMOCION, S.L.</td>
            </tr>
            <tr>
                <td colspan="3"><b>DIRECCION</b></td>
                <td colspan="3">Av. GREGORIO ARCOS N 41</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td><b>POBLACION</b></td>
                <td>ALBACETE</td>
                <td>CP</td>
                <td>02007</td>
                <td>PROVINCIA</td>
                <td>ALBACETE</td>
            </tr>
            <tr>
                <td><b>TELEFONO</b></td>
                <td colspan="5">&nbsp;</td>
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
                <td>{{$loadOrder->customer->infoCars->count()}}</td>
                <td class="td-left"><label>PORTE DE VEHICULOS</label></td>
                <td class="td-right">80</td>
                <td class="td-right">320</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td class="td-left">12/08/2019: CIUDAD REAL // ALBACETE</td>
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
                <td class="td-title">320</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="td-title"><label>IVA 21%</label></td>
                <td class="td-title">60,20</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="td-title"><label>TOTAL</label></td>
                <td class="td-title">387,20</td>
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
                <td>TRANSFERENCIA BANCARIA AL N DE CTA ES 34902073 1644 0287 5522</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
