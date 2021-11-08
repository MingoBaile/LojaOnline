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
            $email      = $_POST['loginName'];
            $password   = $_POST['loginPassword'];
            $user = User::searchUser($email);

            if($user == false){
                Notification::View("E-mail ou senha incorretos!","info","--color-feedback-negative-4");
                $this->view("Login");
            }else if(password_verify($password,$user->getPassword())){
                $_SESSION['user'] = $user;
                $this->profile();
            }else{
                Notification::View("E-mail ou senha incorretos!","info","--color-feedback-negative-4");
                $this->view("Login");
            }
        }else{
            Notification::View("E-mail ou senha incorretos!","info","--color-feedback-negative-4");
            $this->view("Login");
        }
    }

    public function logout(){
        unset($_SESSION["user"]);
        $this->view("Home");
    }
}

?>