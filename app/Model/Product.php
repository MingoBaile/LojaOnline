<?php 
    // namespace app\Model;

    class Product {

        private $id;
        private $title;
        private $descrition;
        private $idcategory;
        private $price;
        private $imgBanner;
        private $imgsGallery;

        // Getters
        public function getId(){
            return $this->id;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getDescrition(){
            return $this->descrition;
        }

        public function getIdCategory(){
            return $this->idcategory;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getImgBanner(){
            return $this->imgBanner;
        }

        public function getImgsGallery(){
            return $this->imgGallery;
        }

        // Setters
        public function setId($_id){
            $this->id = $_id;
        }

        public function setTitle($_title){
            $this->title = $_title;
        }

        public function setDescrition($_descrition){
            $this->descrition = $_descrition;
        }

        public function setIdCategory($_idcategory){
            $this->idcategory = $_idcategory;
        }

        public function setPrice($_price){
            $this->price = $_price;
        }

        public function setImgBanner($_imgBanner){
            $this->imgBanner = $_imgBanner;
        }

        public function setImgsGallery($_imgsGallery){
            $this->imgGallery = $_imgsGallery;
        }

        public function __construct(string $_id,string $_title,string $_descrition,string $_idcategory,string $_price,$_imgBanner,$_imgsGallery){
            $this->id = $_id;
            $this->title = $_title;
            $this->descrition = $_descrition;
            $this->idcategory = $_idcategory;
            $this->price = $_price;
            $this->imgBanner = $_imgBanner;
            $this->imgsGallery = $_imgsGallery;
        }
    }

?>