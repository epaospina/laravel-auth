<template>
    <tr>
        <td>
            <div v-if="title"  style="">
                <span v-model="tr.client" @click="title = false">{{tr.client}}</span>
            </div>
            <div v-else>
                <label>
                    <input v-model="tr.client" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-model="tr.buyer" @click="title = false">{{tr.buyer}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.buyer" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-model="tr.action_do" @click="title = false">{{tr.action_do}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.action_do" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div style="width: 130px;display: flex;justify-content: center;">
                <pending-order-car-component
                    v-for="car in tr.car"
                    :key="car.id"
                    :car = "car"
                ></pending-order-car-component>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-html="tr.addresses_load" @click="title = false">{{tr.addresses_load}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.addresses_load" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-model="tr.schedule" @click="title = false">{{tr.schedule}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.schedule" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-html="tr.addresses_download" @click="title = false">{{tr.addresses_download}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.addresses_download" style="width: 100%;">
                </label>
            </div>
        </td>
        <td>
            <div v-if="title">
                <span v-html="tr.contact" @click="title = false">{{tr.contact}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.contact" style="width: 100%;">
                </label>
            </div>
        </td>
        <td style="width: 10%; padding: 1%;">
            <div v-if="title" style="text-align: center;align-items: baseline;">
                <span v-model="tr.observation" @click="title = false">{{tr.observation}}</span>
            </div>
            <div v-else style="display: flex;text-align: center;align-items: baseline;">
                <label>
                    <input v-model="tr.observation" style="width: 100%;">
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
<style>
    td{
        text-align: center;
    }
    label{
        font-size: 10px !important;
        margin: 0;
        text-align: center;
    }
    td > div{
        text-align: center;align-items: baseline;
    }
    td:nth-child(7) > div{
        width: 25vw;
    }
    td:nth-child(8) > div{
        width: 12vw;
    }

    @media print{
        @page {size: landscape}
        td:nth-child(7) > div{
            width: 13vw;
        }
        td:nth-child(8) > div {
            width: 5vw;
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

