<?php

abstract class Controller{
    public function view(string $view, $data = [])
    {
      include_once 'app/View/'. $view .'/index.php';
    }
}

?>