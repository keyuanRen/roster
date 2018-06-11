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
              <img src="images/coffeeDefine.jpg" alt="..." class="img-thumbnail">
              <h2>define your own business model</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster allows manager to control their own business model to suit user needs.</br>&nbsp;&nbsp;type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/coffeeCreate.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-center">make your roster</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster can save manager time for making rosater for employee.</br>&nbsp;&nbsp;type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/coffeeShare.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-right">view your roster</h2>
              <p class="text-justify">&nbsp;&nbsp;The use of TRoaster allows both manager and employee view the roster graghically.</br>&nbsp;&nbsp;type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> 
            </div>
          </div>
        </div>
          <div class ="container registerNowContainer">
            <div class="row registerNow">
              <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                <p>Register Now!      Get Your Business Runnning!</p>
              </div>
              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 registerBtn">
                <button type="button" onclick="window.open('register.php','_self');" class="btn btn-outline-danger">Register Now</button>
              </div>
            </div>
          </div>
    </body>
    <?php include ('includes/footer.php'); ?>
</html>