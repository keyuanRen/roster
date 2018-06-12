$(document).ready( () => {
  let counter = 0;
  $('#add').click( () => {
    let uniqueid = new Date().getTime();
    let template= `
            <div  class="form-row">
              <div class="form-group col-md-2">
                <input type="employeeName" class="form-control" id="inputEmployeeName" placeholder="EmlpoyeeName">
              </div>
              
              <div class="form-group col-md-2">
                <select id="inputState" class="form-control">
                  <option selected>Cooker</option>
                  <option selected>SalesClerk</option>
                  <option selected>Delivery Man</option>
                </select>
              </div>
              
              <div class="form-group col-md-2">
                <input id="startTime" type="time" class="form-control">
              </div>
              
              <div class="form-group col-md-2">
                <input id="finishTime" type="time" class="form-control">
              </div>
              
              <div class="form-group col-md-2">
                <input id="workingDay" type="date" class="form-control">
              </div>
              
              <div class="form-group col-md-1">
                <button type="button" id="add" class="btn btn-primary" ">Add</button>
              </div>
              
              <div class="form-group col-md-1">
                <button type="button" id="confirm" class="btn btn-primary" ">Confirm</button>
              </div>
              
            </div>
    `;
    $('#form').append(template);
  });
});
