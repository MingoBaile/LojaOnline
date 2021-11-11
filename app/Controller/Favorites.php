<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Model/Product.php');
include_once ('dao/Database.php');
include_once ('components/Notification/Notification.php');

class Favorites extends Controller{

    public function favorites(){
        $this->view("Favorites");
    }

    public function getFavorites(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $products = array();
            $db = Database::getConnection();
            $sql = $db->prepare('SELECT `idProduct` FROM Favorites  WHERE idUser = :idUser;');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->execute();

            $data = $sql->fetchAll();

            if($data == NULL) $_POST['products'] = NULL;

            foreach($data as $prod){
                $product = $this->getProduct($prod['idProduct']);
                array_push($products,$product);
            }
            $_POST['products'] = $products;
        }
        
        $this->favorites();
    }

    public function getProduct($id){
        $connect = Database::getConnection();
        $sql = $connect->prepare('SELECT * FROM `Product` WHERE id = :id');
        $sql->bindValue(':id',$id);
        $sql->execute();
        $data = $sql->fetch();
        if($data == NULL) return NULL;
        $prod = new Product($data['id'],$data['title'],$data['descrition'],$data['idCategoria'],$data['price'],$data['imgBanner'],$data['idImgsGallery']);
        return $prod;
    }

    public static function addCart(){
        $idProduct = $_GET['q'];
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        if($user == NULL){
            self::backPage();
        }else if(self::isCartShopping($user->getEmail(),$idProduct)) {
            $count = self::getAmount($user->getEmail(),$idProduct);
            $db = Database::getConnection();
            $sql = $db->prepare('UPDATE CartShopping SET amount = :amount WHERE idUser = :idUser AND idProduct = :idProduct;');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->bindValue(':idProduct',$idProduct);
            $sql->bindValue(':amount',$count+1);
            $sql->execute();
            self::backPage();
        }
        $db = Database::getConnection();
        $sql = $db->prepare('INSERT INTO CartShopping(idUser,idProduct,amount) VALUES(:idUser,:idProduct,:amount);');
        $sql->bindValue(':idUser',$user->getEmail());
        $sql->bindValue(':idProduct',$idProduct);
        $sql->bindValue(':amount',1);
        $sql->execute();
        self::backPage();
    }

    public static function addFavorites(){
        $idProduct = $_GET['q'];
        $idUser = $_SESSION['user'];
        if($idUser == NULL){
            Notification::View("Para favoritar precisa esta logado!","info","--color-feedback-negative-4");
            self::backPage();
        }else if(!self::isFavorites($idUser->getEmail(),$idProduct)){
            $db = Database::getConnection();
            $sql = $db->prepare('INSERT INTO Favorites(`idUser`,`idProduct`) VALUES(:idUser,:idProduct);');
            $sql->bindValue(':idUser',$idUser->getEmail());
            $sql->bindValue(':idProduct',$idProduct);
            $sql->execute();
            self::backPage();
            Notification::View("Produto favoritado!","check","--color-feedback-positive-4");
        }else{
            self::unFavorites($idProduct);
            self::backPage();
            Notification::View("Produto removido dos favoritos!","trash","--color-feedback-positive-4");
        }
        
    }

    public function removeFavorites(){
        $idProduct = $_GET['q'];
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        if($user == NULL){
            header('Location: ../Favorites');
        }else if(self::isFavorites($user->getEmail(),$idProduct)) {
            $db = Database::getConnection();
            $sql = $db->prepare('DELETE FROM Favorites WHERE idUser = :idUser AND idProduct = :idProduct;');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->bindValue(':idProduct',$idProduct);
            $sql->execute();
        }
        header('Location: ../Favorites');
    }

    public function removeAll(){
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        $db = Database::getConnection();
        $sql = $db->prepare('DELETE FROM Favorites WHERE idUser = :idUser;');
        $sql->bindValue(':idUser',$user->getEmail());
        $sql->execute();
        header('Location: ../Favorites');
    }

    public static function unFavorites($idProduct){
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        if($user == NULL){
            header('Location: ../Favorites');
        }else if(self::isFavorites($user->getEmail(),$idProduct)) {
            $db = Database::getConnection();
            $sql = $db->prepare('DELETE FROM Favorites WHERE idUser = :idUser AND idProduct = :idProduct;');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->bindValue(':idProduct',$idProduct);
            $sql->execute();
        }
    }

    public static function isFavorites($idUser,$idProduct){
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM Favorites WHERE idUser = :idUser AND idProduct = :idProduct;');
        $sql->bindValue(':idUser',$idUser);
        $sql->bindValue(':idProduct',$idProduct);
        $sql->execute();
        $data = $sql->fetch();
        if($data == NULL) return false;
        return true;
    }

    public static function isCartShopping($idUser,$idProduct){
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM CartShopping WHERE idUser = :idUser AND idProduct = :idProduct;');
        $sql->bindValue(':idUser',$idUser);
        $sql->bindValue(':idProduct',$idProduct);
        $sql->execute();
        $data = $sql->fetch();
        if($data == NULL) return false;
        return true;
    }

    public static function getAmount($idUser,$idProduct){
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT amount FROM CartShopping WHERE idUser = :idUser AND idProduct = :idProduct;');
        $sql->bindValue(':idUser',$idUser);
        $sql->bindValue(':idProduct',$idProduct);
        $sql->execute();
        $data = $sql->fetch();
        if($data == NULL) return 0;
        return $data['amount'];
    }

    public static function backPage(){
        echo '<script>history.back();</script>';
        exit;
    }
}

?>