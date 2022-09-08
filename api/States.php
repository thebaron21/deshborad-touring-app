<?php

class States{
    private $con;
    public function __construct($connect)
    {
        $this->con = $connect;
    }

    public function init()
    {
        $q = "SELECT * FROM states";

        $result = $this->con->query($q);
        $data = array();
        while($row = $result->fetch_object()){
            array_push($data,$row);
        }
        return  $data;
    }
}