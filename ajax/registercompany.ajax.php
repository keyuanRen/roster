<?php
include('../autoloader.php');
//register company
if($_SERVER['REQUEST_METHOD']=='POST'){
    $response = array();
    $errors = array();
    //create new company class
    $company = new Company();
    //get POST data
    $cname = $_POST["companyName"];
    $cwebsite = $_POST["companyWebsite"];
    $cunit = $_POST["unitNumber"];
    $cnumber = $_POST["streetNumber"];
    $cstreet = $_POST["streetName"];
    $csuburb = $_POST["suburb"];
    $cpostcode = $_POST["postcode"];
    $ccode = $_POST["accessCode"];
    
    $company -> create($cname,$cwebsite,$cunit,$cnumber,$cstreet,$csuburb,$cpostcode,$ccode);
    if( isset($company -> error) == false){
        //success
        $response["success"] = true;
        $response["companyId"] = $company -> company_id;
    }
    else{
        //failed
        $response["success"] = false;
        if($company -> error_code == 1){
            $errors["message"] = "database error";
        }
        if($company -> error_code == 2){
            $errors["message"] = "validation errors";
            $errors["codes"] = $company -> validate_errors;
            $response["errors"] = $errors;
        }
    }
    echo json_encode($response);
}
?>