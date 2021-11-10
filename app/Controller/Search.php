<?php

include_once ('app/Controller/Controller.php');
include_once ('dao/Database.php');
include_once ('app/Model/Product.php');

class Search extends Controller {

    public function page(){
        $this->view("Search");
    }

    public function search(){
        $value = $_GET['search'];
        $products = array();
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM Product WHERE title LIKE "%'.$value.'%";');
        $sql->execute();
        $data = $sql->fetchAll();
        if(!isset($data)) return NULL;
        foreach($data as $row){
            $prod = new Product($row['id'],$row['title'],$row['descrition'],$row['idCategoria'],$row['price'],$row['imgBanner'],$row['idImgsGallery']);
            array_push($products,$prod);
        }
        $_POST['search'] = $products;
        $this->view("Search");
    }
}

?>