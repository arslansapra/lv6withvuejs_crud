<template>
    <!-- The Modal -->
    <div class="modal fade" id="editModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Task</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <p class="alert alert-success" v-if="success.length > 0">{{ success }}</p>
            <label for="name">Task Name</label>
            <textarea name="name" id="name" class="form-control" v-model="rec.name"></textarea>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="updateRecord">Update Task</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          
        </div>
      </div>
    </div>
  
  </template>
  
  <script>
      export default {
        props:['rec'],
        data(){
          return{
            success: '',
            
          }
        },
          mounted() {
              console.log('Edit Task Component mounted.')
        },
          methods:{
            updateRecord(){
              axios.post("http://127.0.0.1:8000/task/"+ this.rec.id,{
                'name': this.rec.name,
                '_method': 'PUT'
              })
                  .then(data => {
                    this.$emit('recordupdated', data);
                    this.success = "Record Updated Successfully!";
                  })
                  .catch((error) => console.log(error))
                  
            }
          }
      }
  </script>
  