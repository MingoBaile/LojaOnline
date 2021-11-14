<?php
include_once ('app/Controller/Controller.php');
include_once ('app/Controller/Auth.php');
include_once ('app/Model/Addres.php');

class Address extends Controller{

    public function address(){
        $this->view("Address");
    }

    public function checkOut(){
        $products = $_SESSION['order'];
        $user = $_SESSION['user'];
        $address = self::getAddressAll($user->getEmail());
        $_POST['address'] = $address;
        $this->address();
    }

    public static function getAddressAll(string $idUser){
        $address = array();
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM Address WHERE idUser = :idUser;');
        $sql->bindValue(':idUser',$idUser);
        $sql->execute();
        $data = $sql->fetchAll();
        if($data == NULL ) return NULL;
        foreach($data as $item){
            $target = new Addres($item['idUser'],$item['nameAddress'],$item['street'],$item['number'],$item['cep'],$item['district'],$item['country'],$item['state'],$item['complement']);
            array_push($address,$target);
        }
        return $address;
    }

    public function insertAddress(){
        $user = Auth::validation() ? $_SESSION['user'] : NULL;
        $nameAddress = $_POST['nameAddress'];
        $number = $_POST['number'];
        $cep = $_POST['cep'];
        $street = $_POST['street'];
        $district = $_POST['district'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $complement = $_POST['complement'];
        $address = new Addres($user->getEmail(),$nameAddress,$street,$number,$cep,$district,$country,$state,$complement);
        if($user == NULL){ 
            $this->address();
            Notification::View("Usuário não esta logado!","info","--color-feedback-negative-4");
        }else{
            $db = Database::getConnection();
            $sql = $db->prepare('INSERT INTO Address(`idUser`,`nameAddress`,`street`,`number`,`cep`,`district`,`country`,`state`,`complement`) VALUES(:idUser,:nameAddress,:street,:number,:cep,:district,:country,:state,:complement);');
            $sql->bindValue(':idUser',$user->getEmail());
            $sql->bindValue(':nameAddress',$address->getNameAddress());
            $sql->bindValue(':street',$address->getStreet());
            $sql->bindValue(':number',$address->getNumber());
            $sql->bindValue(':cep',$address->getCep());
            $sql->bindValue(':district',$address->getDistrict());
            $sql->bindValue(':country',$address->getCountry());
            $sql->bindValue(':state',$address->getState());
            $sql->bindValue(':complement',$address->getComplement());
            $sql->execute();
            $this->address();
            Notification::View("Endereço cadastrado!","check","--color-feedback-positive-4");
        }
    }

    public function removeAddress(){
        $idUser = $_SESSION['user']->getEmail();
        // $id = $_GET['id'];
        $cep = $_GET['cep'];
        // $number = $_GET['number'];
        $db = Database::getConnection();
        $sql = $db->prepare('DELETE FROM Address WHERE idUser = :idUser AND cep = :cep;');
        // $sql->bindValue(':id',$id);
        $sql->bindValue(':idUser',$idUser);
        $sql->bindValue(':cep',$cep);
        // $sql->bindValue(':number',$number);
        $sql->execute();
        // $this->address();
        header('Location: ../Address');
        Notification::View("Endereço removido!","check","--color-feedback-positive-4");
    }
}

?>