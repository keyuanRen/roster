$(document).ready( () => {
  let counter = 0;
  $('#add').click( () => {
    let uniqueid = new Date().getTime();
    let template= `
  <div id="form" class="form-row">
            <div class="form-group col-md-2">
              <label for="inputEmployeeName">Employee</label>
              <input type="employeeName" class="form-control" id="inputEmployeeName" placeholder="Bob">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Job Position</label>
              <select id="inputState" class="form-control">
                <option selected>Cooker</option>
                <option selected>SalesClerk</option>
                <option selected>Delivery Man</option>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Start Time</label>
              <input id="startTime" type="time" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Finish Time</label>
              <input id="finishTime" type="time" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Working Day</label>
              <input id="workingDay" type="date" class="form-control">
            </div>
          </div>
  `;
    $('#form').append(template);
  });
});