<?php
<<<<<<< HEAD
include_once (dirname(__FILE__) .'/Controller.php');
=======
require "/Controller.php";
>>>>>>> a9893e29ccff60fa0c27166d190a75baca2dc3ed

class Home extends Controller{

    public function home(){
<<<<<<< HEAD
        $this->view("Home");
=======
        $this->view('/Home');
>>>>>>> a9893e29ccff60fa0c27166d190a75baca2dc3ed
    }
}

?>