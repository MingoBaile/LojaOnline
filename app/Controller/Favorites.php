<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Favorites extends Controller{

    public function favorites(){
        $this->view("Favorites");
    }
}

?>