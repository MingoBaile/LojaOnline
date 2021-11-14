<?php 
    // namespace app\Model;

    class Addres {

        private $idUser;
        private $nameAddress;
        private $street;
        private $number;
        private $cep;
        private $district;
        private $state;
        private $country;
        private $complement;

        // Getters
        public function getIdUser(){
            return $this->idUser;
        }

        public function getNameAddress(){
            return $this->nameAddress;
        }

        public function getStreet(){
            return $this->street;
        }

        public function getNumber(){
            return $this->number;
        }

        public function getCep(){
            return $this->cep;
        }

        public function getDistrict(){
            return $this->district;
        }

        public function getCountry(){
            return $this->country;
        }

        public function getState(){
            return $this->state;
        }

        public function getComplement(){
            return $this->complement;
        }

        // Setters
        public function setIdUser($_idUser){
            $this->idUser = $_idUser;
        }

        public function setNameAddress($_nameAddress){
            $this->nameAddress = $_nameAddress;
        }

        public function setStreet($_street){
            $this->street = $_street;
        }

        public function setCep($_cep){
            $this->cep = $_cep;
        }

        public function setNumber($_number){
            $this->number = $_number;
        }

        public function setDistrict($_district){
            $this->district = $_district;
        }

        public function setCountry($_country){
            $this->country = $_country;
        }

        public function setState($_state){
            $this->state = $_state;
        }

        public function setComplement($_complement){
            $this->complement = $_complement;
        }

        public function __construct(string $idUser,string $nameAddress,string $street,int $number,int $cep,string $district,string $country,string $state,string $complement){
            $this->idUser = $idUser;
            $this->nameAddress = $nameAddress;
            $this->street = $street;
            $this->number = $number;
            $this->cep = $cep;
            $this->district = $district;
            $this->country = $country;
            $this->state = $state;
            $this->complement = $complement;
        }
    }

?>