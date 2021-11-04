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

    public static function resetSessionNotification(){
        unset($_SESSION['notification-login']);
        unset($_SESSION['notification-login-empty']);
        unset($_SESSION['notification-register-err']);
        unset($_SESSION['notification-register']);
        unset($_SESSION['notification-register-pass-err']);
    }
}
    
?>