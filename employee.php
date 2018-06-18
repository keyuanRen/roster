<?php 
include("autoloader.php");
session_start();
//check if user is not logged in
if(!$_SESSION["account_id"]){
  header("location:login.php");
  exit();
}
else{
  //get the company id from session
  $company_id = $_SESSION["company_id"];
  $account_id = $_SESSION["account_id"];
}

?>


<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
          <div>
            <label><h3>Your Working Shift:</h3></label>
          </div>
          
          <div class="table-responsive-sm">
            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col">Job Position</th>
                  <th scope="col">Working Day</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">Finish Time</th>
                  
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
            
                  
                  $account_id = $_SESSION['account_id'];
                  
                  //get employee data
                  $employee = new Employee();
                  $employeeID = $employee -> getEmployeeId( $account_id );
                  $query = "SELECT
                  job_position,
                  shift_date,
                  time_start,
                  time_end
                  FROM shifts
                  where employee_id = ?";
                  
                  $statement = $connection -> prepare( $query );
                  $statement -> bind_param( 'i' ,$employeeID);
      
                  
                  if ($statement -> execute())
                  {
                    $result = $statement -> get_result();
                   // Fetch one and one row
                    while ($row = $result->fetch_assoc())
                    {
                      echo "<tr>";
                      echo "<th scope='row'>".$row['job_position']."</th>";
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
          </div>
        
          
    </body>
    <?php include ('includes/footer.php'); ?>
</html>

