<template>
  <!-- The Modal -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
          <label for="name">Task Name</label>
          <textarea name="name" id="name" class="form-control" v-model="record"></textarea>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" @click="addRecord">Add Task</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</template>

<script>
    export default {
      data(){
        return{
          success: '',
          record:'',
        }
      },
        mounted() {
            console.log('Add Task Component mounted.')
      },
        methods:{
          addRecord(){
            axios.post("http://127.0.0.1:8000/task",{
              'name': this.record,
            })
                .then(data => {
                  this.$emit('recordadded', data);
                  this.success = "Record Added Successfully!";
                })
                .catch((error) => console.log(error))
                this.record = '';
          }
        }
    }
</script>
