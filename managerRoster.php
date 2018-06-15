<?php 
include("autoloader.php");
session_start();
print_r($_SESSION);
//get all the company employees, based on manager's id
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

              
                $timestart = "SELECT * FROM shifts inner join accounts 
                on shifts.account_id = accounts.account_id
                and role_id = 3";
  
              
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
        
        <button type="submit" class="btn btn-primary float-right">Share To Employee</button>
          
    </body>
    <?php include ('includes/footer.php'); ?>
</html>