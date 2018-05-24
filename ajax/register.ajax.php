<?php
include('../autoloader.php');

$class = new Account();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $account_name = $_POST["account_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $defineUser = $_POST["role"];
    $accesscode = $_POST["accessCode"];
      
    //send data to account -> register
    $registration = $class -> register($account_name, $email, $password, $defineUser, $accesscode);
    
    $response = array();
    $errors = array();
    
    if( $registration == true)
    {
        //you assigned value of true using double equals
        //$response["success"] == true;
        $response["success"] = true;
    }
    else 
    {
        $response["success"]  = false;
        $errors = $class -> errors;
        $response["errors"] = $errors;
    }
    echo json_encode($response);
}
?>