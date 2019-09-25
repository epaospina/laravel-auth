<template>
    <div class="content-bill" >
        <div id="contentBill">
            <div class="header-start">
                <div class="header-logo">
                    <img :src="urlImg" alt="Mc Vehiculos">
                    <a v-model="email"> {{email}} </a>
                </div>
                <div class="header-number">
                    <div>
                        <label>N° de factura</label>
                        <input class="input-n-bill" v-model="numBill" v-if="allEdit">
                        <a v-else v-model="numBill"> {{numBill}} </a>
                    </div>
                    <div>
                        <span class="title-bill">Factura</span>
                    </div>
                </div>
            </div>
            <div class="header-bill">
                <table>
                    <tbody>
                    <tr>
                        <td colspan="2" class="title-bill"><label>VARIOS</label></td>
                    </tr>
                    <tr>
                        <td><b>Fecha</b></td>
                        <td>
                            <input v-model="date" v-if="allEdit">
                            <span v-else v-model="date"> {{date}} </span>
                        </td>
                    </tr>
                    <tr>
                        <td><b>C.I.F</b></td>
                        <td>
                            <input v-model="cif" v-on:keypress="esCif(cif)" v-if="allEdit">
                            <span v-else v-model="cif"> {{cif}} </span>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <table style="width: 50%;">
                    <tbody>
                    <tr>
                        <td colspan="6"><label>CLIENTE</label></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>NOMBRE: </b></td>
                        <td colspan="3">
                            <input v-model="name_client" v-if="allEdit">
                            <span v-else v-model="name_client"> {{name_client}} </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>DIRECCION</b></td>
                        <td colspan="3">
                            <input v-model="address_client" v-if="allEdit">
                            <span v-else v-model="address_client"> {{address_client}} </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td><b>POBLACION</b>
                            <select>
                                <option value="provincia"><b>PROVINCIA</b></option>
                                <option value="pais"><b>PAIS</b></option>
                            </select>
                        </td>
                        <td colspan="3" style="width: 100%;">
                            <input v-if="allEdit" v-model="city_client" v-on:keypress="maxLength($event, 20, city_client)" class="input-td-city">
                            <span v-else v-model="city_client"> {{city_client}} </span>
                            <br>
                            <input v-if="allEdit" v-model="department_client" v-on:keypress="maxLength($event, 20, department_client)" class="input-td-city">
                            <span style="width: 100%;" v-else v-model="department_client"> {{department_client}} </span>
                        </td>
                        <td class="td-xs"><b>CP</b></td>
                        <td class="td-xs" style="width: 50%;">
                            <input v-if="allEdit" v-model="postal_cod_client">
                            <span v-else v-model="postal_cod_client"> {{postal_cod_client}} </span>
                        </td>
                    </tr>
                    <tr>
                        <td><b>TELEFONO</b></td>
                        <td colspan="5"></td>
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
                        <td class="td-title color-total"><label>TOTAL</label></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="td-title"><label>DESCRIPCION</label></td>
                        <td>&nbsp;</td>
                        <td class="color-total">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="unit-td">
                            <!--<input v-model="quantity_car" disabled>-->
                            <span v-model="quantity_car"> {{quantity_car}} </span>
                        </td>
                        <td class="td-left"><label v-model="name_service">{{name_service}}</label></td>
                        <td class="td-right">
                            <input v-if="allEdit" v-model="unit_price" v-on:keypress.prevent="bill_val(unit_price, $event)" class="price-td td-right">
                            <span v-else v-model="unit_price"> {{unit_price}} </span>
                        </td>
                        <td class="td-right color-total">
                            <!--<input v-model="price" class="price-td td-right" disabled>-->
                            <span v-model="price"> {{price}} </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="td-left">
                            <textarea v-if="allEdit" v-model="description_bill">{{description_bill}}</textarea>
                            <span v-else v-model="description_bill"> {{description_bill}} </span>
                        </td>
                        <td class="td-right">&nbsp;</td>
                        <td class="td-right color-total">&nbsp;</td>
                    </tr>
                    <table-car-component
                        v-for="car in cars"
                        :key="car.id"
                        :car="car">
                    </table-car-component>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="td-title"><label>SUBTOTAL</label></td>
                        <td class="td-right td-title color-total">
                            <!--<input v-model="price" class="price-td td-right" disabled>-->
                            <span v-model="price"> {{price}} </span>
                        </td>
                    </tr>
                    <tr class="show-iva" v-if="esCif(cif)">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="td-title"><label>IVA 21%</label></td>
                        <td class="td-right td-title color-total"><span v-model="iva_bill"> {{iva_bill}}</span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="td-title"><label>TOTAL</label></td>
                        <td class="td-right td-title color-total"><span v-model="total_bill"> {{total_bill}}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-footer">
                <div class="footer-bill">
                    <table class="table-footer">
                        <tbody>
                        <tr>
                            <td>MEDIO DE PAGO:</td>
                            <td><span v-model="payment_type"> {{payment_type}}</span></td>
                        </tr>
                        <tr>
                            <td>COMENTARIOS:</td>
                            <td>
                                <textarea v-if="allEdit" v-model="observations_bill"> {{observations_bill}}</textarea>
                                <span v-else v-model="observations_bill"> {{observations_bill}}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="footer-end">
                    <p>TRANSCALYGUZ, S.L. C/ ALTAGRACIA N° , 13003 CIUDAD REAL. TELF.: 926228453/FAX:926222588. CIF: B13523345</p>
                </div>

                <div class="bill-btn">
                    <button v-if="allEdit" class="btn btn-danger" v-on:click="saveBill()" @click="allEdit = false">
                        <label>- FACTURAR - <i class="fas fa-file-invoice"></i></label>
                    </button>
                    <button  v-else class="btn btn-danger" @click="allEdit = true">
                        <label>- EDITAR - <i class="fas fa-edit"></i></label>
                    </button>
                    <div v-if="!allEdit" class="btn btn-bitbucket" v-on:click="printTable('contentBill')">IMPRIMIR</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['order_id'],
        data(){
            return {
                urlImg: '../../images/logomcTrans.png',
                numBill: 'T0669/2019',
                email: 'mcvehiculos1935@msn.com',
                date : 'ok',
                cif: 'cif',
                name_client: 'name_client',
                address_client: 'address_client',
                city_client: 'city_client',
                department_client: 'department_client',
                postal_cod_client: 'postal_cod_client',
                quantity_car : 0,
                name_service: 'cif',
                unit_price: 0,
                price: 0,
                description_bill: 'city_client',
                iva_bill : 0,
                total_bill: 0,
                observations_bill: 'name_client',
                cars: [],
                allEdit: true,
                payment_type: 'Tranferencia Bancaria'
            }
        },

        methods:{
            listBill(){
                axios.get('/bills/load-order-api/' + this.order_id).then(response => {
                    console.log(response);
                    this.date = response.data.date;
                    this.numBill = response.data.bill.num_bill;
                    this.cif = response.data.bill.cif;
                    this.name_client = response.data.bill.name_client;
                    this.address_client = response.data.bill.address_client;
                    this.city_client = response.data.bill.city_client;
                    this.department_client = response.data.bill.department_client;
                    this.postal_cod_client = response.data.bill.postal_cod_client;
                    this.quantity_car = response.data.cars.length;
                    this.name_service = response.data.services.nombre;
                    this.unit_price = (parseFloat(response.data.services.precio)).toFixed(2);
                    this.price = (parseFloat(this.unit_price*response.data.cars.length)).toFixed(2);
                    this.description_bill = response.data.bill.description;
                    this.iva_bill = parseFloat(response.data.bill.iva).toFixed(2);
                    this.total_bill = (parseFloat(this.iva_bill) + (parseFloat(this.price))).toFixed(2);
                    this.cars = response.data.cars;
                    this.payment_type = response.data.bill.payment_type;
                    this.observations_bill = response.data.bill.observations;
                })
            },
            maxLength(event, max, id){
                if(id.length <= 12){
                    id += event.key
                }
            },
            esCif(cif){
                let cif_iva = false;
                if (cif != null){
                    if (cif.length > 1) {
                        let letter = cif.substring(0, 1);

                        let regex = /^[0-9\s]*$/;
                        let isValid = regex.test(letter);

                        if (isValid || letter === 'B-' || letter === 'B' || letter === 'b' || letter === 'A' || letter === 'a') {
                            this.iva_bill = parseFloat(0.21*this.price).toFixed(2);
                            cif_iva = true;
                        } else {
                            this.iva_bill = 0;
                        }
                        this.total_bill = (parseFloat(this.iva_bill) + (parseFloat(this.price))).toFixed(2);
                    }
                }

                return cif_iva;
            },
            bill_val(unit_price, event){
                if (unit_price != null){
                    this.unit_price += event.key;
                    this.price = (parseFloat(this.unit_price) * (parseInt(this.quantity_car))).toFixed(2);
                    this.iva_bill = (0.21*this.price).toFixed(2);
                    this.total_bill = (parseInt(this.iva_bill) + (parseFloat(this.price))).toFixed(2);
                }
            },
            saveBill() {
                let data = {
                    'urlImg'                    : this.urlImg,
                    'numBill'                   : this.numBill,
                    'email'                     : this.email,
                    'load_id'                   : this.order_id,
                    'date'                      : this.date,
                    'cif'                       : this.cif,
                    'name_client'               : this.name_client,
                    'address_client'            : this.address_client,
                    'city_client'               : this.city_client,
                    'department'                : this.department_client,
                    'postal_cod_client'         : this.postal_cod_client,
                    'quantity_car'              : this.quantity_car,
                    'name_service'              : this.name_service,
                    'unit_price'                : this.unit_price,
                    'price'                     : this.price,
                    'description_bill'          : this.description_bill,
                    'iva_bill'                  : this.iva_bill,
                    'total_bill'                : this.total_bill,
                    'observations_bill'         : this.observations_bill,
                    'cars'                      : this.cars,
                };

                $.ajax({
                    url: "/bills/"+ this.order_id,
                    type: 'PUT',
                    data: data,
                    success: function() {
                    }
                });

            },
            printTable(divName) {
                let printContents = document.getElementById(divName).innerHTML;
                let originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        },
        created(){
            this.listBill();
        }
    }
</script>
