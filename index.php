<?php 
include("autoloader.php");

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body></body>
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/carousel.php'); ?>
        
        <div class="container thumbnails">
          <div class="row">
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/coffeeDefine.jpg" alt="..." class="img-thumbnail">
              <h2>define your own business model</h2>
              <p class="text-justify">The use of TRoaster allows manager to control their own business model to suit user needs.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/coffeeCreate.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-center">make your roaster</h2>
              <p class="text-justify">The use of TRoaster can save manager time for making rosater for employee.</p> 
            </div>
            <div class="col-sm item bg-muted text-secondary">
              <img src="images/coffeeShare.jpg" alt="..." class="img-thumbnail">
              <h2 class="text-left text-sm-right">view your roaster</h2>
              <p class="text-justify">The use of TRoaster allows both manager and employee view the roster graghically</p> 
            </div>
          </div>
        </div>
          <div class ="container registerNowContainer">
            <div class="row registerNow">
              <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12">
                <p>Register Now!      Get Your Business Runnning!</p>
              </div>
              <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 registerBtn">
                <button type="button" class="btn btn-outline-danger" href="register.php">Register Now</button>
              </div>
            </div>
          </div>
    </body>
    <footer>
      <img class="mw-100 w-100 h-1" style="height: 10vh;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxkwboagJGTLg09eNC9ni7h1CPQcwNIMJSMdenoLY3XF78QtcoQ" alt="Max-width 100%">
    </footer>
</html>