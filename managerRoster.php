<?php 
include("autoloader.php");

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <div>
            <img class="managerBanner" src="images/banner2.jpg">
        </div> 
        
        <form>
          
          <div>
            <label><h3>Your Employee Working Shift:</h3></label>
          </div>
          
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">EmployeeName</th>
                <th scope="col">StartTime</th>
                <th scope="col">FinishTime</th>
                <th scope="col">WorkingDay</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>9:00am</td>
                <td>12:00pm</td>
                <td>Monday</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>12:00pm</td>
                <td>5:00pm</td>
                <td>Thurday</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Tonny</td>
                <td>9:00am</td>
                <td>5:00pm</td>
                <td>Friday</td>
              </tr>
            </tbody>
          </table>
          
        </form>
        
        <button type="submit" class="btn btn-primary float-right">Share To Employee</button>
          
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>