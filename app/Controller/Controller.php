<?php
<<<<<<< HEAD

abstract class Controller{
    public function view(string $view, $data = [])
    {
      require 'app/View/'. $view .'/index.php';
=======
abstract class Controller
{
    public function view(string $view, $data = [])
    {
      require 'app/View/'. $view .'/';
>>>>>>> a9893e29ccff60fa0c27166d190a75baca2dc3ed
    }
}

?>