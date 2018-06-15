<?php
include('../autoloader.php');
//only respond to 'post' requests
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $account_name = $_POST['account_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = intval($_POST['roleId']);
    $access_code = $_POST['accessCode'];
    
    $response = array();
    $errors = array();
    
    //create employee class
    $employee = new Employee();
    //create  account
    $creation = $employee -> create($account_name,$email,$password,$roleId,$access_code);
    
    if( $creation == true ){
        $response['success'] = true;
    }
    else{
        $response['success'] = false;
        $response['errors'] = $manager -> errors;
    }
    echo json_encode($response);
}
?>