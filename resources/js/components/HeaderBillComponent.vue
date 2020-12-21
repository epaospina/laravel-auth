<template>
    <div class="header-start">
        <div class="header-logo">
            <img :src="header.urlImg" alt="Mc Vehiculos">
            Factura
        </div>
        <div class="header-number">
            <div>
                N de factura <input style="width: 70%;" v-model="header.numBill">
            </div>
            <div>
                <input v-model="header.email">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['header'],
        data(){
            return {
                numBill: 'T0669/2019',
                urlImg: '../../images/logoMC.png',
                email: 'mcvehiculos1935@msn.com'
            }
        },

        methods:{
        },
        created(){
        }
    }
</script>
<style>DATOS DEL VEHICULO / FAHRZEUGDATEN
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
