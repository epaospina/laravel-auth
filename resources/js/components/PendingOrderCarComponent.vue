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
