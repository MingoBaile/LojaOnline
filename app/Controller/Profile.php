<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Profile extends Controller{

    public function profile(){
        $this->view("Profile");
    }

    public function loginAuth(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email      = $_POST['loginName'];
            $password   = $_POST['loginPassword'];
            if(!isset($email) && !isset($password)){
                $this->view("Login");
                $_SESSION['notification-login-empty'] = true;
                die();
            }
            $user = User::searchUser($email);
            
            if(password_verify($password,$user->getPassword())){
                session_start();
                $_SESSION['user'] = $user;
                $this->view("Profile");
            }else{
                $this->view("Login");
                $_SESSION['notification-login'] = true;
                die();
            }
        }
    }

    public function logout(){
        // if(unset($_SESSION["user"])){
        unset($_SESSION["user"]);
        $this->view("Home");
        // }
    }
}

?>