<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Address extends Controller{

    public function address(){
        $this->view("Address");
    }

    public function checkOut(){
        $products = $_GET['products'];
        $this->address();
    }
}

?>