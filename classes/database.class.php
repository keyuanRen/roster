<?php
class Database
{
    private $username;
    private $password;
    private $host;
    private $database;
    
    protected $connection;
    
    protected function __constrcut()
    {
        $this -> username = getenv('dbuser');
        $this -> password = getenv('dbpassword');
        $this -> host = getenv('dbhost');
        $this -> database = getenv('database');
        $this -> connect();
    }
    
    private function connect()
    {
        $this -> connection = mysqli_connect(
            $this -> host,
            $this -> username,
            $this -> password,
            $this -> database
            
            );
    }
    
}
?>