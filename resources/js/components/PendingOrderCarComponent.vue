<template>
    <div>
        <p v-html="car">
            {{car}}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['car', 'cars'],
        data(){
            return {
                action_do: "DESCARGAR",
                addresses_download: "CARRETERA DE CARRION 12, NAVES B Y C",
                addresses_load: "AV. GREGORIO ARCOS, 41",
                buyer: "JESUS LA CHICA",
                car_data: "BMW S7",
                client: "ALBAMOCION, S.L.",
                contact: "RAUL",
                observation: "",
                schedule: "",
            }
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
