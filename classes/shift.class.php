<?php
class Shift extends Database{
    public function __construct(){
        parent::__construct();
    }
    
    public function createShift($employeeId,$jobPostion,$date,$timeStart,$timeEnd)
    {
        $start_date = date_format(date_create($date), "Y-m-d");
        $start_time = date_format(date_create($timeStart), "H:i:s");
        $end_time = date_format(date_create($timeEnd), "H:i:s");
        
        $query = "INSERT INTO shifts (employee_id,job_position,shift_date,time_start,time_end) 
        values(?,?,?,?,?)";
        
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'issss' ,$employeeId,$jobPostion,$start_date,$start_time,$end_time);
        
        
        
      if( $statement -> execute() ){
          $this -> employee_id = $this -> connection -> insert_id;
          return true;
      }
      else{
          $this -> errors["shift"] = "database error";
          $this -> connection -> error;
          return false;
      }
    }
    
    public function showShiftForEmployee($account_id)
    {
        $query = "SELECT
        shift_id,
        employee_id,
        job_position,
        shift_date,
        time_start,
        time_end
        FROM shifts 
        INNER JOIN accounts 
        ON shifts.account_id = accounts.account_id
        WHERE
        accounts.account_id =?
        AND 
        role_id = 3 
        AND 
        published = 1";
        
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'i' ,$account_id);
        $statement -> execute();
        $result = $statement -> get_result();
        if( $result -> num_rows > 0 ){
            $employee_shifts = array();
            while($row = $result -> fetch_assoc() ){
                array_push( $employee_shifts, $row );
            }
            return $employee_shifts;
        }
        else{
            return false;
        }
    }
    
    public function showShiftForManager($company_id)
    {
        $query = "SELECT * 
        FROM shifts 
        inner join accounts 
        on shifts.employee_id = accounts.account_id
        WHERE accounts.company_id = ? ";
        
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'i' ,$company_id);
        $statement -> execute();
        $result = $statement -> get_result();
        if( $result -> num_rows > 0 )
        {
            $employee_shifts = array();
            while($row = $result -> fetch_assoc() ){
                array_push( $employee_shifts, $row );
            }
            return $employee_shifts;
        }
        else{
            return false;
        }
    }
    
    static function getEmployeeId( $account_id ){
        $query = "SELECT employee_id FROM employees WHERE account_id = ?";
        $statement = $this -> connection -> prepare( $query );
        $statement -> bind_param( 'i' ,$account_id);
        $statement -> execute();
        $result = $statement -> get_result();
        $row = $result -> fetch_assoc();
        
        return $row["employee_id"];
    }
}

?>