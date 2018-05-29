<?php
class Manager extends Account{
    public $manager_id;
    public function __construct(){
        parent::__construct();
    }
    public function create($account_name,$email,$password,$roleId,$companyId){
        //create account in account table
        //since this class extends the Account class, it can access Account class's methods and properties, such as register() as its own
        $account = $this -> register($account_name,$email,$password,$roleId,$companyId);
        if( $account ){
            //get the account id
            $account_id = $this -> account_id;
            //create the account as manager account
            $this -> createManager( $account_id );
            return true;
        }
        else{
            //account creation failed
            //check $this -> errors for errors
            return false;
        }
    }
    private function createManager( $account_id ) {
       $manager_query = 'INSERT INTO manager (account_id) VALUES(?)';
       $statement = $this -> connection -> prepare( $manager_query );
       $statement -> bind_param( 'i' , $account_id );
       if( $statement -> execute() ){
           //store the id of the newly created manager
           $this -> manager_id = $this -> connection -> insert_id;
           return true;
       }
       else{
           $this -> errors["manager"] = "database error";
           return false;
       }
    }
}
?>