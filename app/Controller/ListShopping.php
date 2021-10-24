<?php
include_once (dirname(__FILE__) .'/Controller.php');

class ListShopping extends Controller{

    public function listshopping(){
        $this->view("ListShopping");
    }
}

?>