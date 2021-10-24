<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Login extends Controller{

    public function login() {
        $this->view("Login");
    }

    public function logout(){
        // header('Location: ../Home');
        $this->view("Home");
    }
}

?>