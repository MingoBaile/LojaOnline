<?php
include_once ('app/Controller/Controller.php');

class Home extends Controller{

    public function home(){
        $this->view("Home");
    }
}

?>