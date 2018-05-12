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
          
        </form>
        
        <button type="submit" class="btn btn-primary">Confirm Setting</button>
          
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>