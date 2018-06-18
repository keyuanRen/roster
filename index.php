<?php 
include("autoloader.php");
session_start();

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body>
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/carousel.php'); ?>
      
        <div class="container thumbnails">
          <div class="row">
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/car1.jpg" alt="..." class="img-thumbnail">
              <h2>define your own business model</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster allows manager to control their own business model to suit user needs.</br>&nbsp;&nbsp;When manager register, the system will generate the access code for the company and manager will need to fill up their business
              information. The use of access code is for the employee's registeration where they need to define which company they belong to.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/car2.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-center">make your roster</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster can save manager time for making rosater for employee.</br>&nbsp;&nbsp;
              In here, manager can see their employee and organize their job position, working date, working start time and working finish time. 
              Manager can also view their all of the employee's work shift whos belong to his company.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/car3.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-right">view your roster</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster allows both manager and employee view the roster graghically.</br>&nbsp;&nbsp;
              As employee, Troster provide you the online updated work shift for you from your manager. You can check your work shift at any time.</p> 
            </div>
          </div>
        </div>
          <div class ="container registerNowContainer">
            <div class="row registerNow">
              <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                <p>Register Now!      Get Your Business Runnning!</p>
              </div>
              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 registerBtn">
                <button type="button" onclick="window.open('register.php','_self');" class="btn btn-outline-light">Register Now</button>
              </div>
            </div>
          </div>
    </body>
    <?php include ('includes/footer.php'); ?>
</html>