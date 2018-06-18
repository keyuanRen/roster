<?php
class Account extends Database{
  public $account_id;
  public $role_id;
  public $company_id;
  public $errors = array();
  public function __construct(){
    parent::__construct();
  }
  public function register($account_name,$email,$password,$roleId, $companyId){
    $errors = array();
    
    //check the username
    if( strlen( trim($account_name) ) < 4 ){
      $errors["account_name"] = "must be at least 4 characters";
    }
    if( strlen( $username ) > 8){
      $errors["account_name"] = "max 8 characters";
    }
    if( $this -> checkUserName($account_name) ){
      $errors["account_name"] = $errors["account_name"] . " " . "username already used";
    }
    
    //validate the email
    if( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
      $errors["email"] = "invalid email address";
    }
    if( $this -> checkEmail($email) ){
      $errors["email"] = "email already used";
    }
    //validate the password
    if( strlen( $password ) < 6 ){
      $errors["password"] = "password must be at least 6 characters";
    }
    
    //check if role_id is numeric
    if( strlen( (string) $roleId ) == 0 ){ 
      $errors["role"] = "role id length error";
    }
    
    if( ctype_digit( (string) $roleId) == false ){
      $errors["role"] = "role id digit error $roleId";
    }
    
    //check if company_id is numeric
    if( strlen( (string) $companyId ) == 0 ){
      $errors["company"] = "company id length error";
    }
    
    if( ctype_digit( (string) $companyId) == false ){
      $errors["company"] = "company id digit error $companyId";
    }
    //if no errors, insert into database
    if( count($errors) == 0 ){
      $query = '
      INSERT INTO accounts 
      (account_name,email,password,role_id,company_id)
      VALUES
      ( ?, ?, ?, ?, ?)';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('sssii', $account_name, $email, $hash, $roleId, $companyId);
      //execute query
      if( $statement -> execute() ){
        if(session_status() == PHP_SESSION_NONE)
        {
          session_start();
        }
        $_SESSION["account_name"] = $account_name;
        $_SESSION["account_id"] = $this-> connection -> insert_id;;
        $_SESSION["role"] = $roleId;
        $_SESSION["company_id"] = $companyId;
        $this -> account_id = $this -> connection -> insert_id;
        $this -> role_id = $roleId;
        return true;
      }
      else{
        //database error
        if($this -> connection -> err_no == '1062'){
          $errors['email'] = "email already used";
          $this -> errors = $errors;
        }
        return false;
      }
    }
    else{
      //there are errors
      $this -> errors = $errors;
      return false;
    }
  }

  public function checkUserName($account_name){
    //check if username is already in database
    //return true if exists and false otherwise
    $query = "SELECT account_name FROM accounts WHERE account_name = ?";
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param( 's', $account_name );
    $statement -> execute();
    $result = $statement -> get_result();
    if( $result -> num_rows > 0 ){
      //username exists
      return true;
    }
    else{
      //username does not exist
      return false;
    }
    $statement -> close();
  }
  
  public function checkEmail($email){
    //check if email is already in database
    //return true if exists and false otherwise
    $query = "SELECT email FROM accounts WHERE email = ?";
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param( 's', $email );
    $statement -> execute();
    $result = $statement -> get_result();
    if( $result -> num_rows > 0 ){
      //email exists
      return true;
    }
    else{
      //email does not exist
      return false;
    }
    $statement -> close();
  }
  
  public function registerCompany($companyName, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode){
    $errors = array();
    
    //check the username
    if( strlen( trim($companyName) ) < 4 ){
      $errors["companyName"] = "must be at least 4 characters";
    }
    if( $this -> checkCompanyName($companyName) ){
      $errors["companyName"] = $errors["companyName"] . " " . "companyName already used";
    }
    
    if( count($errors) == 0 ){
      $query = 'INSERT INTO companies
      (company_name, company_website, unit_number, street_number, street_name, suburb, postcode, access_code)
      values
      (?, ?, ?, ?, ?, ?, ?, ?)';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('ssssssss',$businessName, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode);
      //execute query
      if( $statement -> execute() ){
        return true;
      }
      else{
        //database error
        return false;
      }
    }
    else{
      //process errors
      $this -> errors = $errors;
      return false;
    }
    
  }
  
  public function checkCompanyName($companyName){
    //check if company name is already in database
    //return true if exists and false otherwise
    $query = "SELECT company_name FROM companies WHERE company_name = LOWER( ? )";
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param( 's', $companyName );
    $statement -> execute();
    $result = $statement -> get_result();
    if( $result -> num_rows > 0 ){
      //company exists
      return true;
    }
    else{
      //company does not exist
      return false;
    }
    $statement -> close();
  }
  
  
  public function authenticate($credential, $password){
    $query = "SELECT account_id,account_name,email,password,role_id,company_id
    FROM accounts WHERE account_name=? OR email=?";
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param('ss',$credential,$credential);
    $statement -> execute();
    $result = $statement -> get_result();
    if( $result -> num_rows > 0 ){
      $row = $result -> fetch_assoc();
      $stored_hash = $row["password"];
      if( password_verify($password,$stored_hash) ){
        //password matches
        //create session variables to indicate that user
        //has successfully logged in
        session_start(); //start the session
        $_SESSION["account_name"] = $row["account_name"];
        $_SESSION["account_id"] = $row["account_id"];
        $_SESSION["role"] = $row["role_id"];
        $_SESSION["company_id"] = $row["company_id"];
        //set class properties
        $this -> company_id = $row["company_id"];
        $this -> role_id = $row["role_id"];
        return true;
      }
      else{
        //password does not match registration
        $this -> errors["password"] = "wrong credentials supplied";
        return false;
      }
    }
    else{
      //there is no account with supplied credentials
      $this -> errors["accounts"] = "there is no account matching credentials supplied";
      return false;
    }
  }
}
?>