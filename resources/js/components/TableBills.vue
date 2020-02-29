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
            :items="items"
            :fields="fields"
            bordered
            borderless
            small
            fixed
            responsive="sm"
            stacked="md"
            :filter="filter"
            class="text-break"
        >
            <template v-slot:cell(order_load)="row">
                <b-link :href="'bills/load-order/' + row.item.order_id" class="btn btn-outline-primary">
                    Ver Factura
                </b-link>
            </template>
        </b-table>
    </div>
</template>

<script>
    import jsPDF from 'jspdf'
    export default {
        props: ['loadOrder'],
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
                Vue.axios.get('/load-orders/list-country').then((response) => {
                    this.countries = response.data;
                });
            },
            ejemplopdf(){
                var doc = new jsPDF;

                doc.text('Hello world!', 10, 10);
                doc.save('a4.pdf')
            },
            showLoadOrder(row){
                console.log(row)
            }
        },
        created(){
            this.fields = [
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
                    key: 'num_bill',
                    label: 'Numero de factura',
                    sortable: true
                },
                {
                    key: 'created_at',
                    label: 'Fecha de creacion',
                    sortable: true
                },
                {
                    key: 'order_load',
                    label: 'Orden de carga',
                }
            ];
            Vue.axios.get('/bills/').then((response) => {
                let createItems = [];
                $.each(response.data, function(key, value) {
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
