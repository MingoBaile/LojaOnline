<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Home extends Controller{

    public function home(){
        $this->view("Home");
    }
}

?>