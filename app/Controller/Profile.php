<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Controller/Auth.php');

class Profile extends Controller{

    public function profile(){
        $this->view("Profile");
    }

    public function loginAuth(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_SESSION['notification-login-empty'] = false;
            $email      = $_POST['loginName'];
            $password   = $_POST['loginPassword'];
            $user = User::searchUser($email);

            if($user == false){
                header('Location: ../Login');
                $_SESSION['notification-login'] = true;
                die();
            }else if(password_verify($password,$user->getPassword())){
                $_SESSION['user'] = $user;
                $this->profile();
            }else{
                header('Location: ../Login');
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