<?php
include('autoloader.php');
session_start();

$role = $_GET["role"];

$code = new AccessCode(6);

//check for POST request
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
  //receive variables from form
  $companyName = $_POST["companyName"];
  $companyWebsite = $_POST["companyWebsite"];
  $unitNumber = $_POST["unitNumber"];
  $streetNumber = $_POST["streetNumber"];
  $streetName = $_POST["streetName"];
  $suburb = $_POST["suburb"];
  $postcode = $_POST["postcode"];
  $accesscode = $_POST["accessCode"];
  
  $account = new Account();
  $registration = $account -> registerCompany($companyName, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode);
  
  
  $success = array();
  $errors = array();
  
  if( $registration == true ){
    $success["registration"] = "Company successfully created!";
  }
  else{
    $errors["registration"] = "There has been an error!";
  }
}
?>
<!doctype html>
<html>
  <?php include ('includes/head.php'); ?>
  <body>
    <script>
    //generate access code it's now done via PHP see /classes/accesscode.class.php
      let code = 0;
      
      function generateAccessCode(){
        return Math.random().toString(36).substr(2, 6);
      }
      // window.addEventListener('load', () => {
      //   const accessCode = generateAccessCode();
      //   document.getElementById('accessCode').value=accessCode.toUpperCase();
      //   code = accessCode;
      // });
    </script>
    <?php include('includes/navbar.php'); ?>
    
    <div class="container content">
      
      <?php
      if( count($success) > 0 ){
        $msg = implode( " ", $success );
      
      echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <strong>Success</strong> $msg
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>";
      }
      
      if( count($errors) > 0 ){
        $msg = implode( " ", $errors );
      echo "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
        <strong>Error</strong> $msg
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>";
      }
      ?>
      
      
      
      <div class="row">
        
        <div class="col-md-6 col-sm-6 col-xs-12 item">
                  
        <img class="logoBanner img-fluid" src="images/logo.png">
        
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-12 item loginDiv">
          <h4>Register</h4>
          <h5>Register Your Company</h5>
          <!--Missing form tag added, probably why it did not work-->
          <form id="register-company" method="post" action="registerCompany.php" novalidate>
              <div class="form-row">
                <div class="col-md-6 mb-6">
                  <label for="companyName">Your Company Name</label>
                  <input id="companyName" class="form-control" type="text" name="companyName" placeholder="Company Name" required>
                  <div class="invalid-feedback">Please enter a company name</div>
                </div>
                <div class="col-md-6 mb-6">
                  <label for="companyWebsite">Your company website</label>
                  <input id="companyWebsite" class="form-control" type="url" name="companyWebsite" placeholder="Company Website" required>
                  <div class="invalid-feedback">Please enter a valid url</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-2 mb-3">
                  <label for="unitNumber">Unit</label>
                  <input id="unitNumber" class="form-control" type="text" name="unitNumber" placeholder="unit">
                </div>
                <div class="col-md-3 mb-3">
                  <label for="streetNumber">Number</label>
                  <input id="streetNumber" class="form-control" type="text" name="streetNumber" placeholder="number" required>
                  <div class="invalid-feedback">Please enter a street number</div>
                </div>
                <div class="col-md-7 mb-3">
                  <label for="streetName">Street Name</label>
                  <input id="streetName" class="form-control" type="text" name="streetName" placeholder="street name" required>
                  <div class="invalid-feedback">Please enter a street name</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-9 mb-3">
                  <label for="suburb">Suburb</label>
                  <input id="suburb" class="form-control" type="text" name="suburb" placeholder="Suburb" required>
                  <div class="invalid-feedback">Please enter a suburb name</div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="postcode">Postcode</label>
                  <input id="postcode" class="form-control" type="text" name="postcode" placeholder="Postcode" required>
                  <div class="invalid-feedback">Please enter a postcode</div>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-6 offset-md-3 my-4">
                  <label for="accessCode">Access Code For Your Employees</label>
                  <input id="accessCode" class="form-control font-weight-bold text-monospace" type="text" name="accessCode" placeholder="Access Code" readonly value="<?php echo $code;?>">
                </div>
              </div>
              
              <input type="hidden" name="role" value="<?php echo $role;?>">
            
              <div class="text-center">
              <!--  <button type="submit" name="register-btn" onclick="window.open('registerManager.php?role=3&accessCode='+code,'_self');"-->
              <!--class="btn btn-outline-primary btn-block">-->
              <!--  Register Company-->
              <!--  </button>-->
                <button type="submit" name="company-register-btn" class="btn btn-outline-primary btn-block">
                Submit
                </button>
              </div>
          </form>
        </div>
        
      </div>
      
    </div>
    <script src="/js/registerCompany.js"></script>
    
  </body>
</html>

<template id="alert-template">
  <div class="alert alert-dismissible fade show" role="alert">
    <span class="alert-message"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</template>