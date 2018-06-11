<?php
class Roster extends Manager{
  public $manager_id;
  public $company_id;
  public $errors = array();
  public function __construct(){
    parent::__construct();
    //get manager id using account id in session
    $this -> manager_id = $this -> getManagerId( $_SESSION['account_id'] );
    //get company id from session
    $this -> company_id = $_SESSION['company_id'];
  }
  public function create($start_date){
    //create a new roster in database
    //if there is no manager_id or no company_id return false
    if( !$this -> manager_id || !$this -> company_id ){
      $this -> errors["parameters"] = "missing parameters";
      return false;
    }
    else{
      $query = "INSERT INTO rosters 
      (company_id,manager_id,start_date,created) 
      VALUES 
      (?,?,?,NOW())";
      $statement = $this -> connection -> prepare($query);
      $statement -> bind_param('iis', $this->company_id, $this->manager_id, $start_date);
      if( $statement -> execute() ){
        $this -> roster_id = $this -> connection -> insert_id;
        return true;
      }
      else{
        return false;
      }
    }
  }
  static function verifyDate($date){
    try{
      $ts = strtotime($date);
      $now = strtotime(date_create());
      if($ts){
        return true;
      }
      else{
        throw new Exception('not a date');
      }
    }
    catch (Exception $e){
      return false;
    }
  }
}
?>