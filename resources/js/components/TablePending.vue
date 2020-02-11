<template>
    <div>
        <b-card class="m-2">
            <b-link class="btn btn-primary col-2" id="pending" onclick="selectCars()">pendientes</b-link>
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
        >
            <template v-slot:row-details="row">
                <b-card>
                    <b-row class="px-4">
                        <b-form-group label="INFORMACION DE LOS COCHES">
                            <b-list-group>
                                <b-list-group-item v-for="(infoCars, index) in row.item.customer.info_cars">
                                    <b-form-checkbox
                                        :key="index"
                                        :value="infoCars.id"
                                        switch
                                    >{{ infoCars.vin }}</b-form-checkbox>

                                    <b-link :href="'/load-orders/' + row.item.hash" class="btn btn-outline-primary">
                                        Ver Orden de carga
                                    </b-link>
                                    <b-link :href="'/load-orders/' + row.item.hash + '/edit'" class="btn btn-primary">
                                        Editar Orden de carga
                                    </b-link>
                                </b-list-group-item>
                            </b-list-group>
                        </b-form-group>
                    </b-row>
                    <div class="footer-btn">
                        <b-link @click="deleteItem(row)" class="btn btn-danger">
                            Eiminar Cliente
                        </b-link>
                        <b-link @click="deleteItem(row)" class="btn btn-outline-primary">
                            Ver CMR
                        </b-link>
                        <b-link @click="deleteItem(row)" class="btn btn-outline-primary">
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
        props: ['loadOrder'],
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
                this.items.splice(row.index, 1)//row.index);
                /*Vue.axios.get('load-orders/list').then((response) => {
                    let createItems = [];
                    $.each(response.data, function(key, value) {
                        value['_showDetails'] = false;
                        createItems.push(value);
                    });
                    this.items = createItems;
                });*/
            },
            countriesList(){
                Vue.axios.get('load-orders/list-country').then((response) => {
                    this.countries = response.data;
                });
            }
        },
        created(){
            this.fields = [
                {
                    key: 'contact_person',
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
                    key: 'date_upload',
                    label: 'Fecha de carga',
                    sortable: true
                }
            ];
            Vue.axios.get('load-orders/cars-pending').then((response) => {
                let createItems = [];
                $.each(response.data, function(key, value) {
                    console.log(value);
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
</style>
