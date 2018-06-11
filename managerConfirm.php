<?php 
include("autoloader.php");
session_start();

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <div>
            <img class="managerBanner" src="images/banner1.jpg">
        </div> 
        
        <form>

          <div>
            <label><h3>Create Your Own Work Shift:</h3></label>
          </div>
        
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
          
          <div class="form-row">
            <button type="submit" id="add" class="btn btn-primary float-right" style="margin-right: 10px;">Add New Row Of Work Shift</button>
            <button type="submit" class="btn btn-primary float-right">Confirm Setting</button>
          </div>
          
        </form>
        <script src="/js/settingRoster.js"></script>
    </body>
    <?php include ('includes/footer.php'); ?>
</html>