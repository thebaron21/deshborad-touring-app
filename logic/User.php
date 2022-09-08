<?php

use LDAP\Result;

include "Models/UserModel.php";
include "Cookies.php";
class User{

    private $conn;
    private $cookite;

    public function __construct($connnect)
    {
        $this->conn = $connnect;
        $this->cookite=new Cookies();
    }

    public function isLogin()
    {
        if($this->cookite->isAuthentication()){
            header("Location:home.php");
        }
    }

    public function signIn($email,$password)
    {
        $hashPassword = $this->hashPassword($password);
        $q = "SELECT * FROM users WHERE email='$email' AND password='$hashPassword'";
        $result = $this->conn->query($q);
        $data = $result->fetch_assoc();
        $this->cookite->setCookies($data['id']);
       
        if( $result->num_rows > 0 ){
            return true;
        }else{
            return false;
        }
        
    }

    public function signUp($username,$email,$password)
    {
        $hashPassword = $this->hashPassword($password);        
        $q = "INSERT INTO users (name,email,password) VALUES('$username','$email','$hashPassword')";
        $result = $this->conn->query( $q );       
        if( $result ){
            return true;
        }else{
            return false;
        }
    }

    public function getAccount($id)
    {
        $q = "SELECT * FROM users WHERE id=$id";
        $result = $this->conn->query($q);
        
        if($result->num_rows > 0){

            $user = $result->fetch_assoc();
            $userModel = new UserModel($user["id"],$user["name"],$user["email"],$user["password"]);
            return $userModel;
        }
        return false;
    }

    private function hashPassword($password) 
    {
        return md5($password);
    }
    
}