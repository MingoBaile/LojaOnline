<?php

abstract class Controller{
    public function view(string $view, $data = [])
    {
      require 'app/View/'. $view .'/index.php';
    }
}

?>