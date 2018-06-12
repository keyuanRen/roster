<?php
class Shift extends Database{
    public function __construct(){
        parent::__construct();
    }
    
    public function createShift($employeeId,$jobPostion,$date,$timeStart,$timeEnd)
    {
        $query = "Insert into shifts (employee_id,job_position,shift_date,time_start,time_end) 
        values(?,?,?,?,?)";
        
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'issss' ,$employeeId,$jobPostion,$date,$timeStart,$timeEnd);
        
    // if( $statement -> execute() ){
    //       $this -> employee_id = $this -> connection -> insert_id;
    //       return true;
    //   }
    //   else{
    //       $this -> errors["shift"] = "database error";
    //       return false;
    //   }
    }
}

?>