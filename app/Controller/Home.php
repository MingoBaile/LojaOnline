<?php
require "/Controller.php";

class Home extends Controller{

    public function home(){
        $this->view('/Home');
    }
}

?>