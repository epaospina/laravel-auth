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
        <td v-html="tr.contact">{{tr.contact}}</td>
        <td style="width: 10%; padding: 1%;">
            <div v-if="title" style="text-align: center;align-items: baseline;">
                <span v-model="tr.observation" @click="title = false">{{tr.observation}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.observation" style="width: 40%;">
                </label>
                <i class="fas fa-check" @click="title = true"></i>
            </div>
        </td>
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
                title: true,
                newObservation: 0
            }
        }
    }
</script>

