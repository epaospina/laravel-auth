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
            <template v-slot:cell(_showDetails)="row">
                <b-link :href="'/load-orders/' + row.item.hash" class="btn btn-outline-primary">
                    <i class="fas fa-stream"></i>
                </b-link>
                <b-link :href="'/load-orders/' + row.item.hash + '/edit'" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                </b-link>
                <b-link @click="deleteItem(row)" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </b-link>
            </template>
            <template v-slot:cell(contact_person)="row">
                {{ row.item.contact_person }}
            </template>
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
                    key: 'date_upload',
                    label: 'Fecha de carga',
                    sortable: true
                },
                {
                    key: '_showDetails',
                    label: 'Detalle',
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
        }
    }
</script>
