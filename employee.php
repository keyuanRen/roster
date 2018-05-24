<?php 
include("autoloader.php");
?>


<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
        <?php include('includes/navbar.php'); ?>
        
        <!--<div>-->
        <!--    <img class="managerBanner" src="images/banner2.jpg">-->
        <!--</div> -->
        <form>
          
          <div>
            <label><h3>Your Working Shift:</h3></label>
          </div>
          
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Job Position</th>
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

                
                $timestart = "SELECT * FROM shifts ";
    
                
                if ($result=mysqli_query($connection,$timestart))
                {
                 // Fetch one and one row
                  while ($row=mysqli_fetch_row($result))
                  {
                    echo "<tr>";
                    echo "<th scope='row'>$row[0]</th>";
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
          
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>

