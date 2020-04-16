<template>
    <div>
        <b-card class="m-2">
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
                        <b-form-group label="INFORMACION DE LOS COCHES">
                            <b-list-group>
                                <b-list-group-item :key="index+infoCars.key" v-for="(infoCars, index) in row.item.customer.info_cars">
                                    {{ infoCars.vin }}
                                    <b-link :href="'/load-orders/' + row.item.hash + '/' + infoCars.id" class="btn btn-outline-primary m-1">
                                        Ver Orden
                                    </b-link>
                                    <b-link :href="'/load-orders/' + row.item.hash + '/' + infoCars.id + '/edit'" class="btn btn-outline-primary m-1">
                                        Editar Orden
                                    </b-link>
                                </b-list-group-item>
                            </b-list-group>
                        </b-form-group>
                    </b-row>
                    <div class="footer-btn">
                        <b-link @click="deleteItem(row)" class="btn btn-danger">
                            Eiminar Cliente
                        </b-link>
                        <b-link :href="'load-order/' + row.item.id + '/cmr'" class="btn btn-outline-primary">
                            Ver CMR
                        </b-link>
                        <b-link :href="'bills/load-order/' + row.item.id" class="btn btn-outline-primary">
                            Ver Factura
                        </b-link>
                    </div>
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
                countries: []
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
                Vue.axios.get('load-orders/list-country').then((response) => {
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
                    key: 'data_download.contact_download',
                    label: 'Cliente',
                    sortable: true
                },
                {
                    key: 'import_company',
                    label: 'Compañía',
                    sortable: true
                },
                {
                    key: 'customer.city',
                    label: 'Ciudad',
                    sortable: true
                },
                {
                    key: 'customer.phone',
                    label: 'Contacto',
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
            Vue.axios.get('load-orders/list').then((response) => {
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
