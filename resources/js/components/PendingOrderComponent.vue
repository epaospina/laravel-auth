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
                        <td><label class="carga">CARGA</label></td>
                        <td><label>HORARIO</label></td>
                        <td><label>DESCARGA</label></td>
                        <td><label>CONTACTO</label></td>
                        <td><label class="observation">OBSERVACIONES</label></td>
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
                Vue.axios.get('/load-orders/pending-api/cars/'+this.cars_pending_id).then(response => {
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
<style>
    .pending-order{
        overflow: auto;
    }

    .carga{
        width: 25vw;
    }
    p{
        width: 20vw;
        word-wrap: break-word;
        padding: 1rem;
    }
    .observation{
        font-size: 8px !important;
    }
    @media print{
        @page {size: landscape}
        span{
            font-size: 11px !important;
            line-height : 1px;
        }
        p{
            width: 15vw;
            word-wrap: break-word;
            padding: 10px;
        }

        .carga{
            width: 18vw;
        }
    }

    @media (max-width: 800px) {
        .table.b-table.b-table-stacked-md > tbody > tr > td{
            display: block;
            width: 100%;
        }
        .table.b-table.b-table-stacked-md > tbody > tr {
            display: block;
            width: 100%;
            padding: 1rem;
            border: 2px solid blue;
            margin: 1rem 0;
            background-color: white;
        }
    }
</style>
