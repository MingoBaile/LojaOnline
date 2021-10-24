<?php 

class Database{

    private $connect;

    public function __construct(){

    }

    static function getConnection(){
        // self usando como se fosse o this para o contexto de um static
        if(!isset(self::$connect)){
            self::$connect = new PDO('sqlite:cartuning-store.sqlite'); // Selecionar tipo de linguagem do banco
            self::$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);
        }
        return self::$connect;
    }

    static function createSchema(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE User(
                name        TEXT,
                email       TEXT PRIMARY KEY,
                password    TEXT
            )
        ');
    }

}

?>