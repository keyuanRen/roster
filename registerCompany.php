<?php
include('autoloader.php');

$role = $_GET["role"];

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
    <script type="text/javascript">
    let code = 0;
    window.addEventListener('load',generateAccessCode);
    function generateAccessCode()
    {
      let num = Math.random();
      let accessCode = Math.round(num * 1000000);
      document.getElementById('accessCode').value=accessCode;
      code = accessCode;
    }
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
          <div id="alert-success"></div>
          <h4>Register</h4>
          <h5>Define Your Company</h5>
          
              <div class="form-row">
                <div class="col-md-6 mb-6">
                  <label for="companyName">Set Your Company Name</label>
                  <input id="companyName" class="form-control" type="companyName" name="companyName" placeholder="Company Name" required>
                </div>
                <div class="col-md-6 mb-6">
                  <label for="companyWebsite">Set Your company website</label>
                  <input id="companyWebsite" class="form-control" type="companyWebsite" name="companyWebsite" placeholder="Company Website" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="unitNumber">Unit Number</label>
                  <input id="unitNumber" class="form-control" type="unitNumber" name="unitNumber" placeholder="UnitNumber" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="streetNumber">Street Number</label>
                  <input id="streetNumber" class="form-control" type="text" name="streetNumber" placeholder="StreetNumber" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="streetName">Street Name</label>
                  <input id="streetName" class="form-control" type="text" name="streetName" placeholder="StreetName" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="suburb">Suburb</label>
                  <input id="suburb" class="form-control" type="text" name="suburb" placeholder="Suburb" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="postcode">Postcode</label>
                  <input id="postcode" class="form-control" type="text" name="postcode" placeholder="Postcode" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-12 mb-10">
                  <label for="accessCode">Set Your Business Access Code For Your Employee</label>
                  <input id="accessCode" class="form-control" type="text" name="accessCode" placeholder="Access Code" readonly>
                </div>
              </div>
              
            </form>
            
            <div class="text-center">
              <button type="submit" name="register-btn" onclick="window.open('registerManager.php?role=3&accessCode='+code,'_self');"
              class="btn btn-outline-primary btn-block">Confirm</button>
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