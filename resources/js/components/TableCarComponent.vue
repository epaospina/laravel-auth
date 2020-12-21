<template>
    <tr>
        <td class="td-xs-car">&nbsp;</td>
        <td class="td-left td-xs-car"><span v-model="car.model_car">{{car.model_car}} // {{car.vin}}</span></td>
        <td class="td-right td-xs-car">&nbsp;</td>
        <td class="td-right color-total td-xs-car">&nbsp;</td>
    </tr>
</template>

<script>
    export default {
        props: ['car'],
        data(){
        },

        methods:{
        },
        created(){
        }
    }
</script>
<style>
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
