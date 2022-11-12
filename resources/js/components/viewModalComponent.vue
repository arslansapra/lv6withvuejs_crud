<template>
    <!-- The Modal -->
    <div class="modal fade" id="viewModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">View Task</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <label for="name">Task Name</label>
            <p>{{viewRec.name}}</p>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
          
        </div>
      </div>
    </div>
  
  </template>
  
  <script>
      export default {
        props:['viewRec'],
      }
  </script>
  