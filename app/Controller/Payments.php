<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Payments extends Controller{

    public function payments(){
        $this->view("Payments");
    }
}

?>