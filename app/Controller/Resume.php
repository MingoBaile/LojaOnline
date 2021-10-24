<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Resume extends Controller{

    public function resume(){
        $this->view("Resume");
    }
}

?>