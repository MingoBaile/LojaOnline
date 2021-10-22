<?php

require 'Controller.php';

class Login extends Controller{

    public function login() {
        $this->view('/Login');
    }
}

?>