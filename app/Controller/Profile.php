<?php
include_once (dirname(__FILE__) .'/Controller.php');

class Profile extends Controller{

    public function profile(){
        $this->view("Profile");
    }
}

?>