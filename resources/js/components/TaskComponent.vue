<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Task Component <span class="pull-right"><button data-target="#addModal" data-toggle="modal" class="btn-primary btn-xs">+</button></span></div>

                    <div class="card-body">
                       <ul class="list-group">
                            <li class="list-group-item" v-for="t in tasks.data">
                                {{t.id}} - {{t.name}}
                                <span class="pull-right">
                                    <button data-target="#editModal" data-toggle="modal" class="btn-primary btn-xs" @click="getRecord(t.id)">Edit</button>
                                    <button class="btn-danger btn-xs"  @click="delRecord(t.id)">Delete</button>
                                    <button data-target="#viewModal" data-toggle="modal" class="btn-info btn-xs" @click="getRecord(t.id)">Preview</button>
                                </span>
                            </li>
                       </ul>
                       <pagination :data="tasks" v-on:pagination-change-page="getResults"></pagination>
                    </div>
                </div>
            </div>
        </div>

        <div id="modal">
            <add-task @recordadded="refreshRecord"></add-task>
            <edit-task :rec="editRec" @recordupdated="refreshRecord"></edit-task>
            <view-task :viewRec="editRec"></view-task>
        </div>
    </div>
    
</template>

<script type="text/javascript">

import { RouterLink } from 'vue-router';

Vue.component('pagination', require('laravel-vue-pagination'));
import addtask from './addModalComponent.vue';
import edittask from './editModalComponent.vue';
import viewtask from './viewModalComponent.vue';

    export default {
    data() {
        return {
            tasks: {},
            editRec:{},
        };
    },
    methods: {
        getResults(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            axios.get("http://127.0.0.1:8000/task?page=" + page)
                .then((response) => this.tasks = response.data)
                .catch((error) => console.log(error));
        },
        refreshRecord(record){
            this.tasks = record.data
        },
        getRecord(id){
            axios.get("http://127.0.0.1:8000/task/"+id+'/edit')
                .then((response) => this.editRec = response.data)
                .catch((error) => console.log(error));
        },
        delRecord(id){
            const reply = confirm("Are you sure, you want to delete this record?");
            if(reply){
                axios.post("http://127.0.0.1:8000/task/"+id,{
                'id': id,
                '_method': 'DELETE'
            })
                .then((response) => this.tasks = response.data)
                .catch((error) => console.log(error));
            }
            else{
                return 
            }
           
        }
    },
    mounted() {
        axios.get("http://127.0.0.1:8000/task")
            .then((response) => this.tasks = response.data)
            .catch((error) => console.log(error));
        console.log("Task Component Mounted");
    },
    components: { RouterLink,
        'add-task': addtask,
        'edit-task': edittask,
        'view-task': viewtask,
    }
}
</script>
