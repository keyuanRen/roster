<?php
class Employee extends Account{
    private $company;
    public $employee_id;
    public $errors = array();
    public function __construct(){
        parent::__construct();
        $this -> company = new Company();
    }
    public function create($account_name,$email,$password,$roleId,$access_code){
        //get the company Id according to access code
        $company_id = $this -> company -> getCompanyIdByAccessCode( $access_code );
        if( $company_id == false ){
            $this -> errors['company_id'] = "Access code invalid";
        }
        //make sure role_id is 2 and not above
        if( $roleId < 4 ){
            $this -> errors['role_id'] = "Role not supported";
        }
        $errcount = count( $this -> errors ) > 0 ? false : true;
        if( $errcount ){
            //create the account
            $account = $this -> register($account_name,$email,$password,$roleId,$company_id);
            if( $account ){
                //get the account id
                $account_id = $this -> account_id;
                //create the account as manager account
                return $this -> createEmployee( $account_id ) ? true : false;
            }
            else{
                //account creation failed
                //check $this -> errors for errors
                return false;
            }
        }
        else{
            return false;
        }
    }
    protected function createEmployee($account_id){
        $manager_query = 'INSERT INTO employees (account_id) VALUES(?)';
       $statement = $this -> connection -> prepare( $manager_query );
       $statement -> bind_param( 'i' , $account_id );
       if( $statement -> execute() ){
           //store the id of the newly created manager
           $this -> employee_id = $this -> connection -> insert_id;
           return true;
       }
       else{
           $this -> errors["employee"] = "database error";
           return false;
       }
    }
    
    public function getEmployees($company_id){
        $query = 'Select account_name, account_id from accounts where company_id =?  
        and role_id = 4';
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'i' , $company_id );
        
        if($statement -> execute() ){
            $result = $statement -> get_result();
            if($result -> num_rows > 0)
            {
                 $employees = array();
                 while ($row = $result -> fetch_assoc() ){
                     array_push($employees,$row);
                 }
                 
                 return $employees;
            }
            else
            {
                return false;
            }
        }
        else{
            $this-> errors["employee"]= "database error";
            return false;
        }
    }
    
}

?>