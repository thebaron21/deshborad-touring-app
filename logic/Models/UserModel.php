<?php

class UserModel{
    private $username;
    private $email;
    private $password;
    private $id;

    public function __construct($id,$username,$email,$password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getId()
    {
        return $this->id;
    }

}