<?php 
include("autoloader.php");

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
        
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputEmployeeName">Employee</label>
              <input type="employeeName" class="form-control" id="inputEmployeeName" placeholder="Bob">
              <input type="employeeName" class="form-control" id="inputEmployeeName" placeholder="Chris">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Job Position</label>
              <select id="inputState" class="form-control">
                <option selected>Cooker</option>
                <option selected>SalesClerk</option>
                <option selected>Delivery Man</option>
              </select>
              <select id="inputState" class="form-control">
                <option selected>Cooker</option>
                <option selected>SalesClerk</option>
                <option selected>Delivery Man</option>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Start Time</label>
              <select id="inputState" class="form-control">
                <option selected>9am</option>
                <option selected>12pm</option>
              </select>
              <select id="inputState" class="form-control">
                <option selected>9am</option>
                <option selected>12pm</option>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Finish Time</label>
              <select id="inputState" class="form-control">
                <option selected>12pm</option>
                <option selected>5pm</option>
              </select>
              <select id="inputState" class="form-control">
                <option selected>12pm</option>
                <option selected>5pm</option>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Working Day</label>
              <select id="inputState" class="form-control">
                <option selected>Monday</option>
                <option selected>Tuesday</option>
                <option selected>Wednesday</option>
                <option selected>Thursday</option>
                <option selected>Friday</option>
                <option selected>Saturday</option>
                <option selected>Sunday</option>
              </select>
              <select id="inputState" class="form-control">
                <option selected>Monday</option>
                <option selected>Tuesday</option>
                <option selected>Wednesday</option>
                <option selected>Thursday</option>
                <option selected>Friday</option>
                <option selected>Saturday</option>
                <option selected>Sunday</option>
              </select>
            </div>
          </div>
          
        </form>
        
        <button type="submit" class="btn btn-primary float-right">Confirm Setting</button>
          
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>