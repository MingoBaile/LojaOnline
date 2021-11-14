<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Model/Product.php');
include_once ('dao/Database.php');

class Details extends Controller{
    
    public function details($id){
        $idProduct = $id;
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT id, title, descrition, imgBanner, idCategoria, idImgsGallery, price FROM Product WHERE id = :id');
        $sql->bindValue(':id',$idProduct);
        $sql->execute();

        $data = $sql->fetch();
        if(!isset($data)) die();
        $product = new Product($data['id'],$data['title'],$data['descrition'],$data['idCategoria'],$data['price'],$data['imgBanner'],$data['idImgsGallery']);
        $_POST['product'] = $product;
        $this->view("Details");
    }

    public static function getImgs($id){
        $imgs = array();
        $idProduct = $id;
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT id, img FROM galeryProduct WHERE id = :id');
        $sql->bindValue(':id',$idProduct);
        $sql->execute();

        $data = $sql->fetchAll();
        
        if(!isset($data)) return die();

        foreach($data as  $i){
            array_push($imgs,$i['img']);
        }
        return $imgs;
    }

    public function addCart(){
        $idProduct = $_POST['data'];
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        if($user == NULL) return false;
        if($this->equalsFavorites($user->getEmail(),$idProduct)) return die();
        $db = Database::getConnection();
        $sql = $db->prepare('INSERT INTO Favorites(idUser,idProduct) VALUES(:idUser,:idProduct);');
        $sql->bindValue(':idUser',$user->getEmail());
        $sql->bindValue(':idProduct',$idProduct);
        $sql->execute();
    }

    public function equalsFavorites($idUser, $idProduct){
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM Favorites  WHERE idUser = :idUser AND idProduct = :idProduct;');
        $sql->bindValue(':idUser',$idUser);
        $sql->bindValue(':idProduct',$idProduct);
        $sql->execute();

        $data = $sql->fetch();
        if($data == NULL) return false;
        return true;
    }

    public static function getEvaluation($idProduct){
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT AVG(DISTINCT  score) FROM Evaluation WHERE idProduct = :id');
        $sql->bindValue(':id',$idProduct);
        $sql->execute();
        $data = $sql->fetch();
        if(!isset($data)) return 0;
        $score = $data[0];
        return $score;
    }
}

?>