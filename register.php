<?php
include('autoloader.php');

//check for POST request
// if( $_SERVER['REQUEST_METHOD'] == 'POST'){
//   //receive variables from form
//   $username = $_POST["account_name"];
//   $email = $_POST["email"];
//   $password = $_POST["password"];
//   $defineUser = $_POST["role"];
  
//   $account = new Account();
//   $registration = $account -> register( $username, $email, $password, $defineUser);
  
//   $success = array();
//   $errors = array();
  
//   if( $registration == true ){
//     $success["registration"] = "Account successfully created!";
//   }
//   else{
//     $errors["registration"] = "There has been an error!";
//   }
// }
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
          
          <form id="register-form" method="post" action="register.php">
            
            <div class="form-group define">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active" onclick="window.open('registerCompany.php?role=3','_self');" >
                  <input type="radio" name="role" value="3" id="option1" autocomplete="off" checked> Manager
                </label>
                <label class="btn btn-secondary" onclick="window.open('registerEmployee.php?role=4','_self');" >
                  <input type="radio" name="role" value="4" id="option2" autocomplete="off"> Employee
                </label>
              </div>
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