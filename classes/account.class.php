<?php
class Account extends Database{
  public $errors = array();
  public function __construct(){
    parent::__construct();
  }
  public function register($account_name,$email,$password,$defineUser,
  $businessNumber, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode){
    $errors = array();
    
    //check the username
    if( strlen( trim($account_name) ) < 4 ){
      $errors["account_name"] = "must be at least 4 characters";
    }
    if( strlen( $username ) > 8){
       $errors["account_name"] = "must be max 8 characters";
    }
    if( $this -> checkUserName($account_name) ){
      $errors["account_name"] = $errors["account_name"] . " " . "username already used";
    }
    
    //validate the email
    if( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
      $errors["email"] = "invalid email address";
    }
    
    //validate the password
    if( strlen( $password ) < 6 ){
      $errors["password"] = "password must be at least 6 characters";
    }
    
    
    if( count($errors) == 0 ){
      $query = 'INSERT INTO accounts 
      (account_name,email,password,role_id,company_id)
      VALUES
      ( ?, ?, ?, ?,);
      Insert into companies
      (company_name, company_website, unit_number, street_number, street_name, suburb, postcode, access_code)
      values
      (?, ?, ?, ?, ?, ?, ?, ?)';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('sssi', $account_name, $email, $hash, $defineUser,
      $businessNumber, $companyWebsite, $unitNumber, $streetNumber, $streetName, $suburb, $postcode, $accesscode);
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
  
  
  public function authenticate($credential, $password){
    $query = "SELECT account_id,account_name,email,password
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
        $_SESSION["email"] = $row["email"];
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