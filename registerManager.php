<?php
include('autoloader.php');

//check for POST request
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
  //receive variables from form
  $username = $_POST["account_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $defineUser = $_POST["role"];
  
  $businessNumber = $_POST["businessNumber"];
  $companyWebsite = $_POST["companyWebsite"];
  $unitNumber = $_POST["unitNumber"];
  $streetNumber = $_POST["streetNumber"];
  $streetName = $_POST["streetName"];
  $suburb = $_POST["suburb"];
  $postcode = $_POST["postcode"];
  $accesscode = $_POST["accesscode"];
  
  $account = new Account();
  $registration = $account -> register( $username, $email, $password, $defineUser,
  $businessNumber, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode);
  
  
  $success = array();
  $errors = array();
  
  if( $registration == true ){
    $success["registration"] = "Account successfully created!";
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
          <h4>Register for an account</h4>
          <form id="register-form" method="post" action="register.php">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" class="form-control" type="text" name="account_name" placeholder="jenny66">
              <div id="alert-username"></div>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input id="email" class="form-control" type="email" name="email" placeholder="jenny@example.com">
              <div id="alert-email"></div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" placeholder="minimum 8 characters">
              <div id="alert-password"></div>
            </div>
            
            <form>
              <div class="form-row">
                <div class="col-md-6 mb-6">
                  <label for="businessName">Set Your Business Name</label>
                  <input id="businessName" class="form-control" type="businessName" name="businessName" placeholder="Business Name" required>
                </div>
                <div class="col-md-6 mb-6">
                  <label for="companyWebsite">Set Your company website</label>
                  <input id="companyWebsite" class="form-control" type="companyWebsite" name="companyWebsite" placeholder="Company Website" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="unitNumber">Unit Number</label>
                  <input id="unitNumber" class="form-control" type="unitNumber" name="unitNumber" placeholder="Unit Number" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="streetNumber">Street Number</label>
                  <input id="streetNumber" class="form-control" type="streetNumber" name="streetNumber" placeholder="Street Number" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="streetName">Street Name</label>
                  <input id="streetName" class="form-control" type="streetName" name="streetName" placeholder="Street Name" required>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="suburb">Suburb</label>
                  <input id="suburb" class="form-control" type="suburb" name="suburb" placeholder="Suburb" required>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="postcode">Postcode</label>
                  <input id="postcode" class="form-control" type="postcode" name="postcode" placeholder="Postcode" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="col-md-12 mb-10">
                  <label for="accessCode">Set Your Business Access Code For Your Employee</label>
                  <input id="accessCode" class="form-control" type="accessCode" name="accessCode" placeholder="Access Code" required>
                </div>
              </div>
              
            </form>
            
            <div class="text-center">
              <button type="submit" name="register-btn" class="btn btn-outline-primary btn-block">Register</button>
            </div>
          </form>
        </div>
        
      </div>
      
    </div>
    <script src="/js/register.js"></script>
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