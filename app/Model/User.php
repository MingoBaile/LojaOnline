<?php

// namespace app\Model;

class User{

    private $name;
    private $password;
    private $email;

    // Getters
    public function getName(){
        return $this->name;
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

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function __construct(string $name,string $email,string $password){
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password,PASSWORD_BCRYPT);
    }

    public static function searchUser(string $email){
        $db = Database::getConnection();
        $query = $db->prepare('SELECT name, email, password FROM User WHERE email = :email;');
        $query->bindValue(':email',$email);
        $query->execute();

        $data = $query->fetch(); // get first return of table

        if(!isset($data)) return false;
        
        $user = new User($data['name'],$data['email'],$data['password']);
        $user->setPassword($data['password']);
        return $user;
    }

    public function equalsUser(string $email){
        $db = Database::getConnection();
        $query = $db->prepare('SELECT email FROM User WHERE email = :email;');
        $query->bindValue(':email',$email);
        $query->execute();
        $data = $query->fetch();
        return $data;
    }

}