<template>
    <tr>
        <td class="td-xs-car">&nbsp;</td>
        <td class="td-left td-xs-car"><span v-model="car.model_car">{{car.model_car}}</span></td>
        <td class="td-right td-xs-car">&nbsp;</td>
        <td class="td-right color-total td-xs-car">&nbsp;</td>
    </tr>
</template>

<script>
    export default {
        props: ['car'],
        data(){
            return {
                model_car: 'cars'
            }
        },

        methods:{
        },
        created(){
        }
    }
</script>
