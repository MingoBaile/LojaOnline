<?php
include_once (dirname(__FILE__) .'/Controller.php');

class OrderFinish extends Controller{

    public function orderfinish(){
        $this->view("OrderFinish");
    }
}

?>