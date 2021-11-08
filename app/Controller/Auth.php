<?php
class Auth{
    public static function validation(){
        if(isset($_SESSION['user'])){
            return true;
        }else{
            unset($_SESSION['user']);
            return false;
        }
    }
}
    
?>