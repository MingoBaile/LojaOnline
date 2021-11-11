<?php
include_once ('app/Controller/Auth.php');
include_once ('app/Controller/Controller.php');
include_once ('app/Controller/Favorites.php');

class CartShopping extends Controller{

    public function cartshopping(){
        $this->view("Cartshopping");
    }

    public function getCartShopping(){
        if(Auth::validation()){
            $user = $_SESSION['user'];
            $products = array();
            $db = Database::getConnection();
            $sql = $db->prepare('SELECT `idProduct` FROM CartShopping  WHERE idUser = :idUser;');
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
        $this->cartshopping();
    }

    public function removeCartShopping(){
        $idProduct = $_GET['q'];
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        if($user == NULL){
            header('Location: ../CartShopping');
        }else if(Favorites::isCartShopping($user->getEmail(),$idProduct)) {
            $db = Database::getConnection();
            $sql = $db->prepare('DELETE FROM CartShopping WHERE idUser = :idUser AND idProduct = :idProduct;');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->bindValue(':idProduct',$idProduct);
            $sql->execute();
        }
        header('Location: ../CartShopping');
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

}

?>