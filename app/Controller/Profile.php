<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Controller/Auth.php');
include_once ('components/Notification/Notification.php');

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
                Notification::View("E-mail ou senha incorretos!","info");
                die();
            }else if(password_verify($password,$user->getPassword())){
                $_SESSION['user'] = $user;
                $this->profile();
            }else{
                header('Location: ../Login');
                Notification::View("E-mail ou senha incorretos!","info");
                // $_SESSION['notification-login'] = true;
                die();
            }
        }else{
            header('Location: ../Login');
        }
    }

    public function logout(){
        unset($_SESSION["user"]);
        $this->view("Home");
    }
}

?>