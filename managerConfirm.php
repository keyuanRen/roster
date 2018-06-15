<?php 
include("autoloader.php");
session_start();

print_r($_SESSION);

$companyId = $_SESSION['company_id'];
$account_id = $_SESSION['account_id'];


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  $employeeId = $_POST["employeeId"];
  $jobPosition = $_POST["jobPosition"];
  $startTime = $_POST["startTime"];
  $data = $_POST["workingDay"];
  $finishTime = $_POST["finishTime"];
  
  $shift = new Shift();
  $shift-> createShift($employeeId,$jobPostion,$date,$startTime,$finishTime);
  
}



//get company data
$comps = new Company();
$company = $comps -> getCompanyById( $companyId );

//get all employees of the company
$emps = new Employee();
$employees = $emps -> getEmployees($companyId);
print_r($employees);
?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        
        <!--<div>-->
        <!--    <img class="managerBanner" src="images/banner1.jpg">-->
        <!--</div>-->
        
        <div class="container mt-4">
          
          <div class="row">
            <div class="col">
              <div class="card border-0">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">
                    <?php echo $company["company_name"]; ?>
                  </h5>
                  <h6>
                    <?php echo "access code: " . $company["access_code"] ?>
                  </h6>
                </div>
              </div>
            </div>
            
            <div class="col">
              <div class="card border-0">
                <div class="card-body">
                  <p><?php echo $company["company_website"]; ?></p>
                  <address>
                    <?php
                    if($company["unit_number"]){
                      echo $company["unit_number"] . "/";
                    echo $company["street_number"];
                    }
                    echo "&nbsp;";
                    echo ucwords($company["street_name"]);
                    echo "<br>";
                    echo ucwords($company["suburb"]);
                    echo "&nbsp;";
                    echo ucwords($company["postcode"]);
                    ?>
                  </address>
                </div>
              </div>
            </div>
            <!--end row-->
          </div>
          <div class="row">
            <div class="col">
              <form id="shift-form">
                <div class="form-group">
                  <label for="employee">
                    Select An Employee
                  </label>
                  <!--<select id="employee" name="employee">-->
                    <?php
                    // foreach($employees as $employee){
                    //   print_r($employee);
                    // }
                    ?>
                  <!--</select>-->
                </div>
              </form>
            </div>
          </div>
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
                foreach ($employees as $value)
                {
                  echo "<option value='". $value[employee_id]. "'>".$value[account_name]."</option>";
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