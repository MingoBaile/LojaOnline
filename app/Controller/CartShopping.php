<?php
include_once (dirname(__FILE__) .'/Controller.php');

class CartShopping extends Controller{

    public function cartshopping(){
        $this->view("CartShopping");
    }
}

?>