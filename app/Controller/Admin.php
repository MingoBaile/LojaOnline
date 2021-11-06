<?php
include_once ('app/Controller/Controller.php');
include_once ('dao/Database.php');
include_once ('app/Model/User.php');

class Admin extends Controller{

    public function admin(){
        $this->view("Admin");
    }

    public static function getUserAll(){
        $listUsers = array();
        $db = Database::getConnection();
        $sql = $db->prepare('SELECT * FROM User;');
        $sql->execute();
        $data = $sql->fetchAll();
        if($data == NULL || $data == false) return false;

        foreach($data as $user){
            $item = new User($user['name'],$user['email'],$user['password']);
            array_push($listUsers,$item);
        }

        return $listUsers;
    }

    public function getUser(){
        $idUser = $_POST['data'];
        $data = User::searchUser($idUser);
        header( "Content-type: application/json" );
        echo json_encode($data);
    }

    public function http_get($_data){
        $url  = 'http://localhost:8888';
        $data = $_data;
        $ch   = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

?>