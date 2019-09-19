<template>
    <tr>
        <td>{{tr.client}}</td>
        <td>{{tr.buyer}}</td>
        <td>{{tr.action_do}}</td>
        <td>
            <pending-order-car-component
                v-for="car in tr.car"
                :key="car.id"
                :car = "car"
            ></pending-order-car-component>
        </td>
        <td>{{tr.addresses_load}}</td>
        <td>{{tr.schedule}}</td>
        <td>{{tr.addresses_download}}</td>
        <td>{{tr.contact}}</td>
        <td>{{tr.observation}}</td>
    </tr>
</template>
<script>
    export default {
        props: ['tr', 'trs'],
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
        }
    }
</script>

