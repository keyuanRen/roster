<?php
class Account extends Database{
  public $errors = array();
  public function __construct(){
    parent::__construct();
  }
  public function register($username,$email,$password){
    $errors = array();
    //check the username
    if( strlen( trim($username) ) < 4 ){
      $errors["username"] = "must be at least 4 characters";
    }
    if( strlen( $username ) > 8){
       $errors["username"] = "must be max 8 characters";
    }
    if( $this -> checkUserName($username) ){
      $errors["username"] = $errors["username"] . " " . "username already used";
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
      $query = 'INSERT INTO manager 
      (username,email,password)
      VALUES
      ( ?, ? , ? )';
      $statement = $this -> connection -> prepare( $query );
      //hash the password
      $hash = password_hash($password, PASSWORD_DEFAULT );
      //bind parameters
      $statement -> bind_param('sss', $username, $email, $hash );
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
  public function checkUserName($username){
    //check if username is already in database
    //return true if exists and false otherwise
    $query = "SELECT username FROM manager WHERE username = ?";
    $statement = $this -> connection -> prepare($query);
    $statement -> bind_param( 's', $username );
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
    $query = "SELECT manager_id,username,email,password 
    FROM manager WHERE username=? OR email=?";
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
        $_SESSION["username"] = $row["username"];
        $_SESSION["manager_id"] = $row["manager_id"];
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
      $this -> errors["manager"] = "there is no account matching credentials supplied";
      return false;
    }
  }
}
?>