<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Model/Product.php');
include_once ('dao/Database.php');

class Favorites extends Controller{

    public function favorites(){
        $this->view("Favorites");
    }

    public function getFavorites(){
        $db = Database::getConnecction();
        $sql = $db->prepare('SELECT * FROM Product WHERE id = :id');
    }
}

?>