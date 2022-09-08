<?php
include "../logic/Connect.php";
include "States.php";
include "Regions.php";
include "Categories.php";
include "HotelAndFood.php";

class Api{
    private $con;

    public function __construct()
    {
        $this->con  = new GetConnection();
        $connect = $this->con->getConnect();

        if( isset($_GET["get"]) && $_GET["get"] == "regions" && isset($_GET["type"]) && isset($_GET["state"])){
            $obj = new Regions($connect);
            $data = $obj->init($_GET["type"],$_GET["state"]);
            $this->convertToJson($data);
        }
        
        else if( isset($_GET["get"]) && $_GET["get"] == "categories" ){

            $obj = new Categories($connect);
            $data = $obj->init();
            $this->convertToJson($data);

        }
        
        else if( isset($_GET["get"]) && $_GET["get"] == "hotels" ){
            
            $obj = new Hotel($connect);
            $data = $obj->init();
            $this->convertToJson($data);
        }
        
        else if( isset($_GET["get"]) && $_GET["get"] == "states" ){
            $obj = new States($connect);
            $data = $obj->init();
            $this->convertToJson($data);
        }
    }

    private function convertToJson($data){
        $info = array( "status" => 200 , "data" => $data  );
        if( count($data) > 0 ){
            echo json_encode( $info );
        }else{
            $info["status"] = 202;
            echo json_encode( $info );
        }
    }

}

new Api();

