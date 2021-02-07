<template>
    <div>
        <b-card class="m-2">
            <b-link class="btn btn-primary col-2 p-2" id="pending" @click="selectCars">PEDIENTES</b-link>
            <b-link class="btn btn-primary col-2 p-2" id="generate_cmr" @click="generateCmr">GENERAR CMR</b-link>
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
            :tbody-tr-class="rowClass"
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
                <b-button class="btn btn-action-pending" @click="confirmarAccion(item)">ENVIAR A RECOGIDOS</b-button>
                <b-link class="btn btn-action-pending" :href="'/load-orders/' + item.hash + '/' + item.car_id">
                    VER ORDEN
                </b-link>
                <b-link class="btn btn-action-pending" :href="'/load-orders/' + item.hash + '/' + item.car_id + '/edit'">
                    EDITAR ORDEN
                </b-link>
                <b-link class="btn btn-action-pending" :href="'/load-order/' + item.order_id + '/cmr'">
                    VER CMR
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
                car: null,
                bgItem: [
                    'mb-2 bg-secondary',
                    'mb-2 bg-success',
                    'mb-2 bg-danger',
                    'mb-2 bg-warning',
                    'mb-2 bg-info',
                    'mb-2 bg-light',
                    'mb-2 bg-dark',
                    'mb-2 bg-white',
                ]
            }
        },
        methods:{
            rowClass(item){
                let index = this.items.indexOf(item)
                if(index > 0){
                    if (this.items[index].order_id === this.items[index - 1].order_id){
                        const random = Math.floor(Math.random() * this.bgItem.length);
                        if ((index - 1) === 0){
                            return 'bg-secondary'
                        }

                        return this.bgItem[random]
                    }else{
                        return null
                    }
                }else{
                    return 'bg-secondary'
                }
            },
            onRowSelected(items) {
                this.selected = items
                items['_showDetails'] = !items['_showDetails'];
            },
            generarLetra(){
                var letras = ["a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9"];
                var numero = (Math.random()*15).toFixed(0);
                return letras[numero];
            },
            colorHEX(){
                var coolor = "";
                for(var i=0;i<6;i++){
                    coolor = coolor + this.generarLetra() ;
                }
                return "#" + coolor;
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
            generateCmr(){
                let data = {
                    cars: this.selected
                };
                Vue.axios.post('/load-orders/pending/select-cars-cmr', data)
                    .then(res => {
                        window.location = res.data;
                    });
            },
            cocheRecogido(){
                this.items.splice(this.items.indexOf(this.car), 1);
                let new_refs = this.$refs.modal;
                let data = {
                    car_id: this.car.car_id
                };
                Vue.axios.post('/load-orders/send-collected', data)
                    .then(function (){
                        new_refs.close();
                    });
            },
            confirmarAccion(item, rowSelected){
                this.$refs.modal.open();
                this.removeSelected = rowSelected
                this.car = item;
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
                    key: 'car_created_at',
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
        .table.b-table.b-table-stacked-md > tbody > tr {
            display: block;
            width: 100%;
            padding: 1rem;
            border: 2px solid blue;
            margin: 1rem 0;
            background-color: white;
        }
    }

    .table-tr-blue{
        width: 100%;
        padding: 1rem;
        border: 2px solid blue;
        margin: 1rem 0;
    }

    .table-tr-red{
        width: 100%;
        padding: 1rem;
        border: 2px solid blue;
        margin: 1rem 0;
    }

    .table-tr-red{
        width: 100%;
        padding: 1rem;
        border: 2px solid blue;
        margin: 1rem 0;
    }

    .btn-action-pending{
        background-color: #000099 !important;
        font-weight: bolder;
        padding: 0.5rem;
        margin: 1rem;
        color: white;
        border: 1px solid;
    }
</style>
