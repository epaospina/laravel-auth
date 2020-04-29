<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            table{
                border: 1px solid transparent;
                width: 100%;
            }
            td{
                border: 1px solid transparent;
            }
            .td-right{
                padding-top: -90px;
                padding-right: 20px;
                text-align: right;
            }
            .td-one{
                padding-bottom: 25px;
                padding-top: 25px;
            }
            .td-two{
                padding-bottom: 30px;
            }
            .td-three{
                padding-bottom: 10px;
                padding-top: 30px;
            }
            .cars{
                padding-top: 40px;
                height: 490px;
                vertical-align: top;
                text-align: left;
            }
            .type-coche{
                padding-left: 90px;
                padding-right: 10px;
                font-size: 13px;
            }
            .date-load{
                display: flex;
                font-size: 12px;
                padding-left: 20px;
            }
            .date-end{
                padding-left: 150px;
            }
        </style>
    </head>
    <body>
        <table>
            <tbody>
            <tr>
                <td class="td-one">
                    <label>
                        {{$customer->signing}}<br>
                        {{$load->addresses_load}}<br>
                        {{$load->city_load}} // {{$load->postal_cod_load}}<br>
                    </label>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="td-two">
                    <label class="info-two">
                        {{$loadOrders->bill_to}}<br>
                        {{$download->addresses_download}}<br>
                        {{$download->city_download}} {{$download->postal_cod_download}}
                    </label>
                </td>
                <td class="td-right">{{$matricula}}</td>
            </tr>
            <tr class="">
                <td>
                    <label>
                        {{$download->addresses_download}}<br>
                        {{$download->city_download}} {{$download->postal_cod_download}}
                    </label>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="td-three">
                    <label class="info-four">
                        {{$load->date_load}}
                        {{$load->addresses_load}}<br>
                        {{$load->city_load}} // {{$load->postal_cod_load}}<br>
                    </label>
                </td>
                <td class="td-three">
                    <p class="type-coche">{{$typeCoche}}</p>
                </td>
            </tr>
            <tr>
                <td class="cars">
                    @foreach($cars AS $key => $infoCar)
                        <div>
                            <label>{{$infoCar->model_car}} {{$infoCar->vin}}</label>
                        </div>
                    @endforeach
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <label>
                        <span class="date-load">
                            {{$load->city_load}}<div class="date-end">{{$load->date_load}}</div>
                        </span>
                    </label>
                </td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </body>
</html>
