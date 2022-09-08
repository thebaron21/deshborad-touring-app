<?php



class Cookies{
    public function setCookies($id)
    {
        if(!isset($_COOKIE["token"])){
            setcookie("token",$id,time()+72*6000);
        }
    }

    public function logout()
    {
        if(isset($_COOKIE["token"])){
            setcookie("token",null);
        }
    }

    public function isAuthentication()
    {
        if(isset($_COOKIE["token"]) && $_COOKIE["token"] != null){
            return true;
        }else{
            return false;
        }
    }
}