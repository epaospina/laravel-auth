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
            :items="items"
            :fields="fields"
            bordered
            borderless
            small
            fixed
            selectable
            responsive="sm"
            @row-selected="onRowSelected"
            :select-mode="'multiple'"
            :filter="filter"
            ref="selectableTable"
            class="text-break"
            stacked="md"
        >
            <template v-slot:cell(selected)="{rowSelected}">
                <b-form-checkbox
                    v-if="rowSelected"
                    v-model="rowSelected"
                    name="check-button" button>
                    <b>SELECCIONADO</b>
                </b-form-checkbox>
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
                this.selected = items
            },
            deleteItem(row){
                this.items.splice(row.index, 1);
            },
            countriesList(){
                Vue.axios.get('/load-orders/list-country').then((response) => {
                    this.countries = response.data;
                });
            },
            selectCars(){
                console.log(this.selected);
                let data = {
                    cars: this.selected
                };
                Vue.axios.post('/load-orders/pending/select-cars', data)
                    .then(res => {
                        window.location = res.data;
                        console.log(res);
                    });
            }
        },
        created(){
            this.fields = [
                {
                    key: 'selected',
                    label: 'Seleccionados'
                },
                {
                    key: 'signing',
                    label: 'Cliente',
                    sortable: true
                },
                {
                    key: 'city',
                    label: 'Ciudad',
                    sortable: true
                },
                {
                    key: 'vin',
                    label: 'Bastidor',
                    sortable: true
                },
                {
                    key: 'model_car',
                    label: 'Modelo',
                    sortable: true
                }
            ];
            Vue.axios.get('/load-orders/consult-cars-pending').then((response) => {
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
</style>
