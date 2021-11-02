<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Controller/Auth.php');

class Profile extends Controller{

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
                $_SESSION['user'] = $user;
                $this->view("Profile");
            }else{
                $this->view("Login");
                $_SESSION['notification-login'] = true;
                die();
            }
        }else{
            header('Location: ../Login');
            die();
        }
    }

    public function logout(){
        unset($_SESSION["user"]);
        $this->view("Home");
    }
}

?>