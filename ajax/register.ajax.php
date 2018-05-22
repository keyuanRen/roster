<?php
include('../autoloader.php');

$class = new Account();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $account_name = $_POST["account_name"];
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
      
    //send data to account -> register
    $registration = $class -> register($account_name, $email, $password, $defineUser,
    $businessNumber, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode);
    
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