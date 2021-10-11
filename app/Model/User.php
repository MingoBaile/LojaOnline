<?php

namespace app\Model;

class User{

    private $id = 1;
    private $name;
    private $date_nasc;
    private $password;
    private $email;

    // Getters
    public function getName(){
        return $this->name;
    }

    public function getDateNasc(){
        return $this->date_nasc;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    // Setters
    public function setName($name){
        $this->name = $name;
    }

    public function setDateNasc($date){
        $this->date_nasc = $date;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setId($id){
        $this->id += $id;
    }


    public function __construct($name,$date_nasc,$password,$email){
        setId(1);
        $this->name = $name;
        $this->date_nasc = $date_nasc;
        $this->password = $password;
        $this->email = $email;
    }
}