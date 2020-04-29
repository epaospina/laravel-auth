<template>
    <div>
        <b-card class="m-2">
            <b-link class="btn btn-primary col-2" id="pending" @click="selectCars">pendientes</b-link>
            <b-form-group
                label=""
                label-for="filterInput"
                class="my-2"
            >
                <b-input-group class="col-4">
                    <b-form-input
                        v-model="filter"
                        type="search"
                        id="filterInput"
                        placeholder="Realizar busqueda"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''">limpiar</b-button>
                    </b-input-group-append>
                </b-input-group>
                <b-form-select v-model="filter" class="my-2 col-4">
                    <b-form-select-option :value="null">filtrar pais</b-form-select-option>
                    <b-form-select-option :key="index" v-for="(country, index) in countries" :value="country">{{country}}</b-form-select-option>
                </b-form-select>
            </b-form-group>
        </b-card>
        <b-table
            head-variant="dark"
            table-variant="secondary"
            striped
            hover
            stacked="md"
            :items="items"
            :fields="fields"
            bordered
            borderless
            small
            fixed
            selectable
            responsive="sm"
            @row-clicked="onRowSelected"
            select-mode="single"
            :filter="filter"
            class="text-break"
        >
            <template v-slot:row-details="row">
                <b-card>
                    <b-row class="px-4">
                        <b-form-group>
                            <b-link :href="'/load-orders/' + row.item.hash + '/' + row.item.order_id" class="btn btn-outline-primary m-1">
                                VER ORDEN
                            </b-link>
                            <b-link :href="'/load-orders/' + row.item.hash + '/' + row.item.order_id + '/edit'" class="btn btn-outline-primary m-1">
                                EDITAR ORDEN
                            </b-link>
                            <b-link :href="'/load-order/' + row.item.order_id + '/cmr'" class="btn btn-outline-primary">
                                VER CMR
                            </b-link>
                            <b-link :href="'/bills/load-order/' + row.item.id" class="btn btn-outline-primary">
                                VER FACTURA
                            </b-link>
                            <b-link @click="deleteItem(row.item)" class="btn btn-danger">
                                ELIMINAR
                            </b-link>
                        </b-form-group>
                    </b-row>
                </b-card>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fields: [],
                items: [],
                filter: null,
                countries: [],
                selected: []
            }
        },
        methods:{
            onRowSelected(items) {
                items['_showDetails'] = !items['_showDetails'];
            },
            deleteItem(row){
                Vue.axios.post('load-order/delete/' + row.item.hash).then(() => {
                    this.items.splice(row.index, 1);
                });
            },
            countriesList(){
                Vue.axios.get('/load-orders/list-country').then((response) => {
                    this.countries = response.data;
                });
            },
            selectCars(){
                let data = {
                    cars: this.selected
                };
                Vue.axios.post('/load-orders/pending/select-cars', data, function (data) {
                    window.location = data;
                });
            }
        },
        created(){
            this.fields = [
                {
                    key: 'country_load',
                    label: 'Pais de carga',
                    sortable: true
                },
                {
                    key: 'city_load',
                    label: 'Ciudad de carga',
                    sortable: true
                },
                {
                    key: 'client',
                    label: 'Cliente',
                    sortable: true
                },
                {
                    key: 'import_company',
                    label: 'Compañía',
                    sortable: true
                },
                {
                    key: 'model_car',
                    label: 'Modelo de Coche',
                    sortable: true
                },
                {
                    key: 'destino',
                    label: 'Destino',
                    sortable: true
                },
                {
                    key: 'vin',
                    label: 'Bastidor',
                    sortable: true
                },
                {
                    key: 'created_at',
                    label: 'Fecha de creacion',
                    sortable: true
                },
                {
                    key: 'date_upload',
                    label: 'Fecha de carga',
                    sortable: true
                }
            ];
            Vue.axios.get('/load-orders/country/' + window.location.pathname.split('/')[3]).then((response) => {
                let createItems = [];
                $.each(response.data, function(key, value) {
                    value['_showDetails'] = false;
                    createItems.push(value);
                });
                this.items = createItems;
            });
            this.countriesList();
        }
    }
</script>
<style>
    .footer-btn{
        display: flex;
        flex-flow: row-reverse;
    }
    @media (max-width: 800px) {
        .table.b-table.b-table-stacked-md > tbody > tr > td{
            display: block;
            width: 100%;
        }
    }
</style>
