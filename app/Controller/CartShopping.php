<?php
include_once ('app/Controller/Controller.php');

class CartShopping extends Controller{

    public function cartshopping(){
        $this->view("Cartshopping");
    }
}

?>