<?php 
    namespace app\Model;
    // use app\Model\User;
    require_once('User.php');

    class Product {
        private $user;

        private $name;
        private $descrition;
        private $pricce;

        public function __construct(){
            $this->user = new User('Gilson','09/08/1994','123','gilsonjosert@gmail.com');
        }
        
        public function insertProduct($name,$descrition,$price){
            $this->name = $name;
            $this->descrition = $descrition;
            $this->price = $price;
        }

        public function toString(){
            print $this->user;
            print $this->name;
            print $this->descrition;
            print $this->price;
        }
    }

?>