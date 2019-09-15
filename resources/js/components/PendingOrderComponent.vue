<template>
    <div>
        <div id="contentTable" class="pending-order">
            <div v-if="title" >
                <h3>COCHES PENDIENTES
                    <span @click="title = false">{{titleCar}}</span>
                </h3>
            </div>
            <div v-else>
                <h3>COCHES PENDIENTES
                    <label>
                        <input :value=titleCar>
                    </label>
                    <div class="btn btn-bitbucket" @click="title = true">Guardar</div>
                </h3>
            </div>
            <table>
                <tbody>
                    <tr>
                        <td><label>CLIENTE</label></td>
                        <td><label>COMPRADOR</label></td>
                        <td><label>ACCION</label></td>
                        <td><label>VEHICULO</label></td>
                        <td><label>CARGA</label></td>
                        <td><label>HORARIO</label></td>
                        <td><label>DESCARGA</label></td>
                        <td><label>CONTACTO</label></td>
                        <td><label>OBSERVACIONES</label></td>
                    </tr>
                    <tr>
                        <td :rowspan="cars.length">{{cars_data.client}}</td>
                        <td :rowspan="cars.length">{{cars_data.buyer}}</td>
                        <td :rowspan="cars.length">{{cars_data.action_do}}</td>
                        <td>
                            <pending-order-car-component
                                v-for="car in cars"
                                :key="car.id"
                                :car = "car"
                            ></pending-order-car-component>
                        </td>
                        <td :rowspan="cars.length">{{cars_data.addresses_load}}</td>
                        <td :rowspan="cars.length">{{cars_data.schedule}}</td>
                        <td :rowspan="cars.length">{{cars_data.addresses_download}}</td>
                        <td :rowspan="cars.length">{{cars_data.contact}}</td>
                        <td :rowspan="cars.length">{{cars_data.observation}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button v-if="title" class="btn btn-bitbucket" @click="printTable('contentTable')">IMPRIMIR</button>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                cars: [],
                cars_data: [{
                    action_do: "DESCARGAR",
                    addresses_download: "CARRETERA DE CARRION 12, NAVES B Y C",
                    addresses_load: "AV. GREGORIO ARCOS, 41",
                    buyer: "JESUS LA CHICA",
                    car_data: "BMW S7",
                    client: "ALBAMOCION, S.L.",
                    contact: "RAUL",
                    observation: "",
                    schedule: "",
                }],
                titleCar: 'ANDALUCIA',
                title: true
            }
        },

        methods:{
            list(){
                axios.get('/load-orders/pending-api/cars').then(response => {
                    this.cars = response.data;
                    this.cars_data.client = response.data[0].client;
                    this.cars_data.buyer = response.data[0].buyer;
                    this.cars_data.action_do = response.data[0].action_do;
                    this.cars_data.addresses_load = response.data[0].addresses_load;
                    this.cars_data.schedule = response.data[0].schedule;
                    this.cars_data.addresses_download = response.data[0].addresses_download;
                    this.cars_data.contact = response.data[0].contact;
                    this.cars_data.observation = response.data[0].observation;
                })
            },
            printTable(divName) {
                let printContents = document.getElementById(divName).innerHTML;
                let originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        },
        created(){
            this.list();
        }
    }
</script>
