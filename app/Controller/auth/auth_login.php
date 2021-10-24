<?php
    function auth_validate($name,$pass){
        $result = false;
        if($name === "gilson.santos" && $pass === "123") $result = true;
        return $result;
    }
?>