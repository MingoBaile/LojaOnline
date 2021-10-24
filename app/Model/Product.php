<?php 
    namespace app\Model;
    // use app\Model\User;
    require_once('User.php');

    class Product {
        private $user;

        private $id;
        private $title;
        private $category;
        private $descrition;
        private $favorite;
        private $price;
        private $imgBanner;
        private $imgsGalery;

        // public function __construct(){}

        // public function __construct($_title,$_category,$_descrition,$_favorite,$_price,$_imgBanner,$_imgsGalery){
        //     $this->title = $_title;
        //     $this->category = $_category;
        //     $this->descrition = $_descrition;
        //     $this->favorite = $_favorite;
        //     $this->price = $_price;
        //     $this->imgBanner = $_imgBanner;
        //     $this->imgsGalery = $_imgsGalery;
        // }

        // public function __construct(){
        //     $this->id = _id;
        //     $this->user = new User('Gilson','09/08/1994','123','gilsonjosert@gmail.com');
        // }
        
        public function insertProduct($_title,$_category,$_descrition,$_favorite,$_price,$_imgBanner,$_imgsGalery){
            $this->title = $_title;
            $this->category = $_category;
            $this->descrition = $_descrition;
            $this->favorite = $_favorite;
            $this->price = $_price;
            $this->imgBanner = $_imgBanner;
            $this->imgsGalery = $_imgsGalery;
        }

        // public function toString(){
        //     print $this->user;
        //     print $this->title;
        //     print $this->descrition;
        //     print $this->price;
        // }
    }

    new Product();

?>