<?php 
include("autoloader.php");
session_start();

// print_r($_SESSION);

//check if user is not logged in
if(!$_SESSION["account_id"]){
  header("location:login.php");
  exit();
}


$company_id = $_SESSION["company_id"];
$account_id = $_SESSION["account_id"];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
  $employeeId = $_POST["employeeId"];
  $jobPosition = $_POST["jobPosition"];
  $startTime = $_POST["startTime"];
  $data = $_POST["workingDay"];
  $finishTime = $_POST["finishTime"];
  
  $shift = new Shift();
  $shift-> createShift($employeeId,$jobPosition,$date,$startTime,$finishTime);
  
}

//get company data
$comps = new Company();
$company = $comps -> getCompanyById( $company_id );

//get all employees of the company
$emps = new Employee();
$employees = $emps -> getEmployees($company_id);
// print_r($employees);
?>

// i add this commons cause
// my team forgot to mention the delete function for roster
// that manager can delete the roster if he makes mistakes
// the plan can be similar like add new roster instead of this,
// using delete SQL query by id from the managerRoster
// the id is the id of the shifts table

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <div class="container mt-4">
          
          <div class="row">
            <div class="col">
              <div class="card card-first border-0 bg-info text-center">
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
              <div class="card border-0 bg-info text-center">
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
          <!--end container-->
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
              <select name="jobPosition" id="jobPosition" class="form-control">
                <option selected value="Sales Clerk">SalesClerk</option>
                <option value="Delivery Man">Delivery Man</option>
                <option value="Cleaner">Cleaner</option>
                <option value="Waiter">Waiter</option>
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
            
            $company_id = $_SESSION['company_id'];
          
            $query = "SELECT 
            s.employee_id,
            a.account_name,
            s.job_position, 
            s.shift_date, 
            s.time_start, 
            s.time_end 
            FROM shifts s,
            employees e,
            accounts a
            where s.employee_id = e.employee_id and e.account_id = a.account_id
            and a.company_id = ?";
            
            $statement = $connection -> prepare( $query );
            $statement -> bind_param( 'i' ,$company_id);
    
            if ($statement -> execute())
            {
              $result = $statement -> get_result();
             // Fetch one and one row
              while ($row = $result->fetch_assoc())
              {
                echo "<tr>";
                      echo "<th scope='row'>".$row['employee_id']."</th>";
                      printf ("<td>%s</td>",$row['account_name']);
                      printf ("<td>%s</td>",$row['job_position']);
                      printf ("<td>%s</td>",$row['shift_date']);
                      printf ("<td>%s</td>",$row['time_start']);
                      printf ("<td>%s</td>",$row['time_end']);
                      echo"</tr>";
                  
              }
                
            }
              
             mysqli_close($connection);
                 
            ?>
                    
            </tbody>
          </table>
          
        </form>
        
    </body>
    <?php include ('includes/footer.php'); ?>
</html>