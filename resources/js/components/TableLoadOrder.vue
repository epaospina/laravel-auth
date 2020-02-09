<template>
    <div>
        <b-col lg="6" class="my-1">
            <b-form-group
                label="Filter"
                label-cols-sm="3"
                label-align-sm="right"
                label-size="sm"
                label-for="filterInput"
                class="mb-0"
            >
                <b-input-group size="sm">
                    <b-form-input
                        v-model="filter"
                        type="search"
                        id="filterInput"
                        placeholder="Realizar busqueda"
                    ></b-form-input>
                    <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                    </b-input-group-append>
                </b-input-group>
            </b-form-group>
        </b-col>

        <b-table
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
                            <b-form-checkbox
                                :key="index"
                                :value="infoCars.id"
                                switch
                                v-for="(infoCars, index) in row.item.customer.info_cars"
                            >{{ infoCars.vin }}</b-form-checkbox>
                        </b-form-group>
                    </b-row>

                    <b-link :href="'/load-orders/' + row.item.hash" class="btn btn-outline-primary">
                        Ver Orden de carga
                    </b-link>
                    <b-link :href="'/load-orders/' + row.item.hash + '/edit'" class="btn btn-primary">
                        Editar Orden de carga
                    </b-link>
                    <b-link @click="deleteItem(row)" class="btn btn-danger">
                        Eiminar Cliente
                    </b-link>
                    <b-link @click="deleteItem(row)" class="btn btn-outline-primary">
                        Ver CMR
                    </b-link>
                    <b-link @click="deleteItem(row)" class="btn btn-outline-primary">
                        Ver Factura
                    </b-link>
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
            Vue.axios.get('load-orders/list').then((response) => {
                let createItems = [];
                $.each(response.data, function(key, value) {
                    console.log(value);
                    value['_showDetails'] = false;
                    createItems.push(value);
                });
                this.items = createItems;
            });
        }
    }
</script>
