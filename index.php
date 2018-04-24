<?php 
include("autoloader.php");

?>

<!doctype html>
<html>
    <?php include('includes/head.php'); ?>
    <body></body>
      <?php include('includes/navbar.php'); ?>
      <?php include('includes/carousel.php'); ?>
        
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <img src="images/bear.jpg" alt="..." class="img-thumbnail">
              <h1>Heading</h1>
              One of three columns
            </div>
            <div class="col-sm">
              <img src="images/dog.jpg" alt="..." class="img-thumbnail">
              <h1>Heading</h1>
              One of three columns
            </div>
            <div class="col-sm">
              <img src="images/home.jpg" alt="..." class="img-thumbnail">
              <h1>Heading</h1>
              One of three columns
            </div>
          </div>
        </div>
        <!--register-->
        <div class ="row w-100 p-3" style="background-color: #eee;">
          <!--<div class="w-100 p-3" style="background-color: #eee;">Width 100%</div>-->
          <div class ="container row justify-content-between">
            <p class="text-uppercase"><hi><strong>Welcome TO TRoster</strong></hi></p>
            <button type="button" class="btn btn-outline-secondary">Register Now</button>
          </div>
        </div>
 
    </body>
    <footer>
      <img class="mw-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRW3RMl9guk5zXXPeunrqN-G5Sn2-c5-vYDPMJy_AHrf0t672Me1g" alt="Max-width 100%">
    </footer>
</html>