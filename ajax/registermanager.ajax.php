<?php
include('../autoloader.php');
//only respond to 'post' requests
if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    $account_name = $_POST['account_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $roleId = intval($_POST['roleId']);
    $companyId = intval($_POST['companyId']);
    
    $response = array();
    $errors = array();
    
    //create manager class
    $manager = new Manager();
    //create manager account
    $creation = $manager -> create($account_name,$email,$password,$roleId,$companyId);
    
    if( $creation == true ){
        $response['success'] = true;
    }
    else{
        $response['success'] = false;
        $response['errors'] = $manager -> errors;
        var_dump($manager);
    }
    echo json_encode($response);
}
?>