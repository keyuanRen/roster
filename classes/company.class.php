<?php
//use this class instead of Accounts to create company!
class Company extends Database{
    public $error;
    public $error_code;
    public $company_id;
    public $validate_errors = array();
    
    public function __construct(){
        parent::__construct();
    }
    public function create(
        $companyName, 
        $companyWebsite, 
        $unitNumber, 
        $streetNumber, 
        $streetName, 
        $suburb, 
        $postcode, 
        $accesscode)
    {
        $errors = array();
        //CHECK COMPANY NAME
        if( strlen($companyName) == 0 || strlen($companyName) < 2 ){
            $errors["name"] = "company name too short";
        }
        if( $this -> cleanString($companyName) == false ){
            $errors["name"] = "contains invalid characters";
        }
        //CHECK COMPANY WEBSITE
        //convert to lowercase
        $url = strtolower( $companyWebsite );
        //get first seven characters
        $http = substr($url,0,7);
        //get first eight characters
        $https = substr($url,0,8);
        //if it does not contain http:// or https://
        if( $http !== 'http://' && $https !== 'https://'){
            //add http:// to it
            $url = 'http://'. $url;
        }
        if( filter_var( $url, FILTER_VALIDATE_URL) == false ){
            $errors["website"] = "invalid URL";
        }
        //CHECK UNIT NUMBER
        //if unit number is not empty
        if( strlen($unitNumber) > 0 ){
            //validate as string
            if( $this -> cleanString($unitNumber) == false ){
                $errors["unit"] = "invalid unit number";
            }
        }
        //CHECK STREET NUMBER
        //check if it is not alphanumeric
        if( ctype_alnum($streetNumber) == false ){
            $errors["number"] = "invalid street number";
        }
        //CHECK STREET NAME
        if( ctype_alpha($streetName) == false ){
            //$errors["street"] = "invalid street name";
        }
        //CHECK SUBURB
        //check if it is not alphabetical
        if( ctype_alpha($suburb)  == false ){
            $errors["suburb"] = "invalid suburb name";
        }
        //CHECK POSTCODE
        if( ctype_alnum($postcode) == false ){
            $errors["postcode"] = "invalid postcode";
        }
        //CHECK ACCESS CODE
        //make sure it is 6 digits
        if( strlen($accesscode) !== 6 ){
            $errors["accesscode"] = "invalid access code";
        }
        
        //IF THERE ARE NO ERRORS
        if( count($errors) == 0 ){
           //insert into the database
           $query = "INSERT INTO companies
            (company_name, company_website, unit_number, street_number, street_name, suburb, postcode, access_code)
            VALUES
            (?, ?, ?, ?, ?, ?, ?, ?)";
            $statement = $this -> connection -> prepare($query);
            $statement -> bind_param("ssssssss",   
                                        $companyName, 
                                        $companyWebsite, 
                                        $unitNumber, 
                                        $streetNumber, 
                                        $streetName, 
                                        $suburb, 
                                        $postcode, 
                                        $accesscode);
            if( $statement -> execute() ){
                //successful
                //set company id variable
                $this -> company_id = $this -> connection -> insert_id;
                return true;
            }
            else{
                $this -> error = "database error";
                $this -> error_code = 1;
                return false;
            }
        }
        //IF THERE ARE ERRORS
        else{
            $this -> validate_errors = $errors;
            $this -> error = "validation error";
            $this -> error_code = 2;
            return false;
        }
    }
    
    private function cleanString( $str ){
        $ent = htmlentities( $str );
        if( strlen($str) !== strlen($ent) ){
            return false;
        }
        else{
            return true;
        }
    }
}
?>