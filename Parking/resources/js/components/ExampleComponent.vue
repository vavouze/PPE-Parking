<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue Datatables Component Example - ItSolutionStuff.com</div>

                    <div class="card-body">
                        <datatable :columns="columns" :data="rows"></datatable>
                        <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { VuejsDatatableFactory } from 'vuejs-datatable';

    export default {
        components: { VuejsDatatableFactory },
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                    {label: 'id', field: 'IDpersonne'},
                    {label: 'Name', field: 'Nom'},
                    {label: 'Email', field: 'Mail'}
                ],
                rows: [],
                page: 1,
                per_page: 10,
            }
        },
        methods:{
            getUsers: function() {
                axios.get('/test').then(function(response){
                    this.rows = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getUsers()
        }
    }
</script>