<?php
class Auth{
    public static function validation(){
        // var_dump($_SESSION['user']);
        // die();
        if(isset($_SESSION['user'])){
            echo ('Autenticado!');
        }else{
            unset($_SESSION['user']);
            // session_abort();
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