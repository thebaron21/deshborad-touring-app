
<?php

class GetConnection{
    private $conn;

    public function __construct(){
        
        $this->conn = new mysqli("localhost","root","","dashboard");

        if($this->conn->connect_error){
            die("Connection Failed : " . $this->conn->connect_error);
        }              
    }

    public function getConnect()
    {
        return $this->conn;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}