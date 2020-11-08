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
            @item="items"
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

            <template v-slot:cell(collected)="{item, rowSelected}">
                <b-button  @click="confirmarAccion(item)">Enviar a recogidos</b-button>
                <b-link :href="'/load-orders/' + item.hash + '/' + item.car_id" class="btn btn-outline-primary m-1">
                    Ver Orden
                </b-link>
                <b-link :href="'/load-orders/' + item.hash + '/' + item.car_id + '/edit'" class="btn btn-outline-primary m-1">
                    Editar Orden
                </b-link>
                <b-link :href="'/load-order/' + item.order_id + '/cmr'" class="btn btn-outline-primary">
                    Ver CMR
                </b-link>
            </template>
        </b-table>

        <sweet-modal title="¡ALERTA!" ref="modal">
            Este vehiculos sera enviado a recogidos. ¿Esta seguro de ejecutar esta accion?

            <template slot="box-action">
                <b-button  @click="cocheRecogido()">Guardar cambios</b-button>
            </template>
        </sweet-modal>
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
                selected: [],
                card: null
            }
        },
        methods:{
            onRowSelected(items) {
                this.selected = items
                items['_showDetails'] = !items['_showDetails'];
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
                let data = {
                    cars: this.selected
                };
                Vue.axios.post('/load-orders/pending/select-cars', data)
                    .then(res => {
                        window.location = res.data;
                    });
            },
            cocheRecogido(){
                console.log(this.card.card_id);
                this.items.splice(this.items.indexOf(this.card), 1);
                let new_refs = this.$refs.modal;
                let data = {
                    card_id: this.card.card_id
                };
                Vue.axios.post('/load-orders/send-collected', data)
                    .then(function (){
                        new_refs.close();
                    });
            },
            confirmarAccion(item, rowSelected){
                this.$refs.modal.open();
                this.removeSelected = rowSelected
                this.card = item;
            }
        },
        created(){
            this.fields = [
                {
                    key: 'selected',
                    label: 'Seleccionados'
                },
                {
                    key: 'contact_download',
                    label: 'Cliente',
                    sortable: true
                },
                {
                    key: 'country',
                    label: 'Pais',
                    sortable: true
                },
                {
                    key: 'city_load',
                    label: 'Ciudad',
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
                    key: 'model_car',
                    label: 'Modelo',
                    sortable: true
                },
                {
                    key: 'collected',
                    label: 'Recogidos'
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
    @media (max-width: 800px) {
        .table.b-table.b-table-stacked-md > tbody > tr > td{
            display: block;
            width: 100%;
        }
    }
</style>
