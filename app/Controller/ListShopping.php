<?php
include_once ('app/Controller/Controller.php');
include_once ('dao/Database.php');
include_once ('app/Model/Product.php');

class ListShopping extends Controller{

    public function listshopping(){
        $this->view("ListShopping");
    }

    public static function getProductCategory($id){
        $products = array();
        $db = Database::getConnection();
        $sqlCategory = $db->prepare('SELECT rowid FROM Category WHERE title LIKE :title;');
        $sqlCategory->bindValue(':title',$id);
        $sqlCategory->execute();
        $id_category = $sqlCategory->fetch();
        $sql = $db->prepare('SELECT * FROM Product WHERE idCategoria = :id;');
        $sql->bindValue(':id',$id_category['id']);
        $sql->execute();
        $data = $sql->fetchAll();
        foreach($data as $row){
            $prod = new Product($row['id'],$row['title'],$row['descrition'],$row['idCategoria'],$row['price'],$row['imgBanner'],$row['idImgsGallery']);
            array_push($products,$prod);
        }
        return $products;
    }
}

?>