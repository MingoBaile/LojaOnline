<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Details extends Controller{

    public function details(){
        $this->view("Details");
    }
}

?>