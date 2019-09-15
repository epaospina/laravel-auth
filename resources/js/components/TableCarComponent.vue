<template>
    <tr>
        <td>&nbsp;</td>
        <td class="td-left"><span v-model="car.model_car">{{car.model_car}}</span></td>
        <td class="td-right">&nbsp;</td>
        <td class="td-right">&nbsp;</td>
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
