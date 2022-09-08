<?php

class Regions{
    private $con;
    public function __construct($connect)
    {
        header("Content-Type:application/json");
        $this->con = $connect;
    }

    public function init($type,$state)
    {
        $q = "SELECT * FROM regions WHERE type='$type' AND state_id=$state";

        $result = $this->con->query($q);        
        $data = array();
        if( $result->num_rows > 0){
            while($row = $result->fetch_object()){
                    if( $row->type == $type && $row->state_id == $state)
                        array_push($data,$row);
                      
            }
            return  $data;
        }

        return array();
        
    }
}