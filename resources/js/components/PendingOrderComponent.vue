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
                    <pending-order-table-component
                        v-for="tr in trs"
                        :key="tr.id"
                        :tr = "tr"
                    ></pending-order-table-component>
                </tbody>
            </table>
        </div>
        <button v-if="title" class="btn btn-bitbucket" @click="printTable('contentTable')">IMPRIMIR</button>
    </div>
</template>

<script>
    export default {
        props: ['cars_pending_id'],
        data(){
            return {
                trs: [],
                titleCar: 'ANDALUCIA',
                title: true
            }
        },

        methods:{
            list(){
                axios.get('/load-orders/pending-api/cars/'+this.cars_pending_id).then(response => {
                    console.log(response.data);
                    this.trs = response.data;
                })
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
            this.list();
        }
    }
</script>
