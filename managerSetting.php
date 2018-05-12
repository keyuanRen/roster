<?php 
include("autoloader.php");

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <div>
            <img class="managerBanner" src="images/carousel3.jpg">
        </div> 
        
        <form>
          
          <div class="form-group row">
            <label for="colFormLabelLg" class="col-sm-4 col-form-label col-form-label-lg"><h2>Company Name:</h2></label>
            <input type="companyName" class="form-control form-control-lg col-sm-4" id="colFormLabelLg" placeholder="Enter your company name">
          </div>
          
          <div>
            <label><h3>Working Periods:</h3></label>
          </div>
        
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputStartTime">Start Time</label>
              <input type="startTime" class="form-control" id="inputStartTime" placeholder="9:00am">
            </div>
            <div class="form-group col-md-4">
              <label for="inputFinishTime">Finish Time</label>
              <input type="finishTime" class="form-control" id="inputFinishTime" placeholder="5:30pm">
            </div>
            <div class="form-group col-md-4">
              <label for="inputBreakTime">Break Time</label>
              <input type="breakTime" class="form-control" id="inputBreakTime" placeholder="12:30pm to 1:30pm">
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmployeePosition">Employee Position</label>
              <input type="employeePosition" class="form-control" id="inputEmployeePosition" placeholder="SalesClerk/cooker">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmployeeNumber">Employee Number</label>
              <input type="employeeNumber" class="form-control" id="inputEmployeeNumber" placeholder="3 employee">
            </div>
          </div>
          
          <div>
            <label><h3>Working Day:</h3></label>
          </div>
          
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Mon</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Tue</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">Wed</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
            <label class="form-check-label" for="inlineCheckbox4">Thur</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
            <label class="form-check-label" for="inlineCheckbox5">Fri</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
            <label class="form-check-label" for="inlineCheckbox6">Sat</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
            <label class="form-check-label" for="inlineCheckbox7">Sun</label>
          </div>
          
        </form>
        
        <button type="submit" class="btn btn-primary float-right" onclick="window.open('managerConfirm.php','_self');">Confirm Setting</button>
          
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>