<?php
include('autoloader.php');

//receive variables from previous page

$role = $_GET["role"];
$code = $_GET["accessCode"];
$companyId = $_GET["companyId"];

//check for POST request
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
  
  //receive variables from form
  $username = $_POST["account_name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $defineUser = $_POST["role"];
  
  $account = new Account();
  $registration = $account -> register( $username, $email, $password, $defineUser);
  
  
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
          <h4>Register</h4>
          <h5>Define Your Account</h5>
          
          <form id="manager-register-form" method="post" action="registerManager.php" novalidate>
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" class="form-control" type="text" name="account_name" placeholder="jenny66" required>
              <!--<div id="alert-username"></div>-->
              <div class="invalid-feedback">
                Please enter a username between 4 and 16 characters
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input id="email" class="form-control" type="email" name="email" placeholder="jenny@example.com" required>
              <!--<div id="alert-email"></div>-->
              <div class="invalid-feedback">
                Please enter a valid email address
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" placeholder="minimum 8 characters" required>
              <!--<div id="alert-password"></div>-->
              <div class="invalid-feedback">
                Please enter a password of 8 characters or longer
              </div>
            </div>
            
            <input name="roleId" type="hidden" value="<?php echo $role; ?>">
            <input name="accessCode" type="hidden" value="<?php echo $code; ?>">
            <input name="companyId" type="hidden" value="<?php echo $companyId; ?>">
            
            <div class="text-center">
              <button type="submit" name="register-btn" class="btn btn-outline-primary btn-block">Register</button>
            </div>
          </form>
        </div>
        
      </div>
      
    </div>
    <script src="/js/registerManager.js"></script>
  </body>
  <?php include ('includes/footer.php'); ?>
</html>

<template id="alert-template">
  <div class="alert alert-dismissible fade show" role="alert">
    <span class="alert-message"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</template>