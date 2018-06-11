<?php
include('autoloader.php');
session_start();

//handle POST request
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  $credentials=$_POST["credentials"];
  $password=$_POST["password"];
  
  //create instance of account class
  $account=new Account();
  $login=$account->authenticate($credentials,$password);
  if($login == true)
  {
    //all good
    //check user's role
    if( $account -> role_id == 4 ){
      $destination = "/employee.php";
    }
    else{
      $destination = "/index.php";
    }
    header("location: $destination");
  }
  else
  {
    //get errors
    $errors=$account->errors;
  }
}

?>
<!doctype html>
<html>
  <?php include ('includes/head.php'); ?>
  <body>
    <?php include('includes/navbar.php'); ?>
    <div class="container-fluid content">
      
      <div class="row">
      
        <div class="col-md-6 col-sm-6 col-xs-12 item">
                  
        <img class="logoBanner img-fluid" src="images/logo.png">
        
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 item loginDiv"> 
          <?php
          if( count($account -> errors) > 0 ){
            $error_string = implode(' ', $account -> errors );
          }
          $alert = "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                      $error_string
                      <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                      </button>
                    </div>";
          echo $error_string;
          ?>
          
          <h4>Login to your account</h4>
          <form id="register-form" method="post" action="login.php">
            <div class="form-group">
              <label for="credentials">Email address or User name</label>
              <input id="credentials" class="form-control" type="text" name="credentials" placeholder="jenny@example.com or jenny66">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" placeholder="minimum 8 characters">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-outline-primary btn-block">Log in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <?php include ('includes/footer.php'); ?>
</html>