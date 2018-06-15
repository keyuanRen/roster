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
        
        <!--<div>-->
        <!--    <img class="managerBanner" src="images/banner4.jpg">-->
        <!--</div>-->
          <div class="container">
            
          </div>
          <div>
            <label><h3>Your Working Shift:</h3></label>
          </div>
          
          <div class="table-responsive-sm">
            <table class="table table-hover table-dark">
              <thead>
                <tr>
                  <th scope="col"></th>
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
                      printf ("<td>%s</td>",$row[2]);
                      printf ("<td>%s</td>",$row[3]);
                      printf ("<td>%s</td>",$row[4]);
                      printf ("<td>%s</td>",$row[5]);
                      echo"</tr>";
                        
                    }
                    
                  // Free result set
                  mysqli_free_result($result);
                  }
                  
                     mysqli_close($connection);
                     
                  ?>
                  
              </tbody>
            </table>
          </div>
        
          
    </body>
    <?php include ('includes/footer.php'); ?>
</html>

