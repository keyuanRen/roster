<?php 
include("autoloader.php");
session_start();

print_r($_SESSION);


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $emloyeeId = $_POST['employeeId'];
  $jobPosition = $_POST["jobPosition"];
  $startTime = $_POST["startTime"];
  $data = $_POST["workingDay"];
  $finishTime = $_POST["finishTime"];
  
  $shift = new Shift();
  $shift-> createShift($employeeId,$jobPostion,$date,$startTime,$finishTime);
  
}

//get all employees of company
$companyId = $_SESSION['company_id'];
$emp = new Employee();
$employees = $emp -> getEmployees($companyId);
?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <div>
            <img class="managerBanner" src="images/banner1.jpg">
        </div> 
        
        <form id="shifts" method="post" action="managerConfirm.php" novalidate>
          <div>
            <label><h3>Create Your Own Work Shift:</h3></label>
          </div>
        
          <div  class="form-row">
            <div class="form-group col-md-2">
              <label for="inputEmployeeName">Employee</label>
              <select type="text" name="employeeId" id="employeeId" class="form-control">
                <?php
                foreach ($employees as &$value)
                {
                  echo "<option value='". $value[account_id]. "'>".$value[account_name]."</option>";
                }
                ?>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Job Position</label>
              <select type="text" name="jobPosition" id="jobPosition" class="form-control">
                <option selected>SalesClerk</option>
                <option selected>Delivery Man</option>
              </select>
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Start Time</label>
              <input name="startTime" id="startTime" type="time" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Finish Time</label>
              <input name="finishTime" id="finishTime" type="time" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
              <label for="inputState">Working Day</label>
              <input name="workingDay" id="workingDay" type="date" class="form-control">
            </div>
            
            <div class="form-group col-md-2">
              <button type="submit" id="insertShift" class="btn btn-primary" style="margin-top: 30px;">Add</button>
            </div>
            
            <!--<div class="form-group col-md-1">-->
            <!--  <button type="button" id="confirm" class="btn btn-primary" style="margin-top: 30px;">Confirm</button>-->
            <!--</div>-->
            
          </div>
          
          <!--<div class="container">-->
          <!--  <div class="form-row">-->
          <!--  <button type="button" id="add" class="btn btn-primary float-right" style="margin-right: 10px;">Add New Row Of Work Shift</button>-->
          <!--  <button type="submit" class="btn btn-primary float-right">Confirm Setting</button>-->
          <!--</div>-->
          <!--</div>-->
          
          <div>
            <label><h3>Your Employee Working Shift:</h3></label>
          </div>
          
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">EmployeeName</th>
                <th scope="col">Work Position</th>
                <th scope="col">WorkingDay</th>
                <th scope="col">StartTime</th>
                <th scope="col">FinishTime</th>
                
              </tr>
            </thead>
            <tbody>
              
              <?php
                //this is the database user that the website will use
 
                $host  = getenv('dbhost');
                $password = getenv('dbpassword');
                $username  = getenv('dbuser');
                $database  = getenv('database');
                
                // Create connection
                $connection = new mysqli($host, $username,$password , $database);
          
                // Check connection
                // if ($connection->connect_error) {
                //     die("Connection failed: " . $connection->connect_error);
                // } 
                // echo "Connected successfully (".$connection->host_info.")";

              
                $timestart = "SELECT * FROM shifts";
  
              
                if ($result=mysqli_query($connection,$timestart))
                {
                 // Fetch one and one row
                  while ($row=mysqli_fetch_row($result))
                  {
                    echo "<tr>";
                    echo "<th scope='row'>$row[0]</th>";
                    printf ("<td>%s</td>",$row[8]);
                    printf ("<td>%s</td>",$row[3]);
                    printf ("<td>%s</td>",$row[4]);
                    printf ("<td>%s</td>",$row[5]);
                    printf ("<td>%s</td>",$row[6]);
                    echo"</tr>";
                      
                  }
                    
                  // Free result set
                  mysqli_free_result($result);
                  }
                  
                 mysqli_close($connection);
                     
                ?>
                    
            </tbody>
          </table>
          
        </form>
        <!--<script src="/js/settingRoster.js"></script>-->
    </body>
    <?php include ('includes/footer.php'); ?>
</html>