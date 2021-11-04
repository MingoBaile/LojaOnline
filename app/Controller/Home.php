<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Model/Product.php');
include_once ('dao/Database.php');

class Home extends Controller{

    public function home(){
        $this->view("Home");
    }

    public static function getProducts(){
        $products = array();
        $connect = Database::getConnection();
        $sql = $connect->prepare('SELECT * FROM `Product`;');
        $sql->execute();
        $data = $sql->fetchAll();
        foreach($data as $row){
            $prod = new Product($row['id'],$row['title'],$row['descrition'],$row['idCategoria'],$row['price'],$row['imgBanner'],$row['idImgsGallery']);
            array_push($products,$prod);
        }
        return $products;
    }

    public static function getProduct(string $search){
        $connect = Database::getConnection();
        $sql = $connect->prepare('SELECT `title` FROM `Product` WHERE `title` LIKE "'.$search.'%";');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    public function search(){
        self::getProduct();
    }

    static function favoritesAll(User $user){
        $connect = Database::getConnection();
        $sql = $connect->prepare('SELECT * FROM `Favorites`;');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    public static function getCatagory(){
        return Database::categoryAll();
    }
    
}

?>