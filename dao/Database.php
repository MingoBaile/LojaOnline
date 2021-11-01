<?php 

class Database{

    private static $pdo;

    public function __construct(){}

    static function getConnection(){
        try{
            if(!isset(self::$pdo)){
                self::$pdo = new PDO("sqlite:dao/cartuning.sqlite","","",array(
                     PDO::ATTR_PERSISTENT => true
                 )); // Selecionar tipo de linguagem do banco
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$pdo;
        }catch(PDOException $e){
            print "Error in openhrsedb ".$e->getMessage();
        }
        // self usando como se fosse o this para o contexto de um static
        
    }

    static function createSchemaUser(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS User(
                name        TEXT NOT NULL,
                email       TEXT PRIMARY KEY,
                password    TEXT NOT NULL
            )
        ');
    }

    static function createSchemaCategory(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Caterogy(
                id          INTEGER PRIMARY KEY,
                img         BLOB NOT NULL,
                url         TEXT NOT NULL
            )
        ');
    }

    static function createSchemaImgGalery(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS galeryProduct(
                id          INTEGER,
                img         BLOB NOT NULL
            )
        ');
    }

    static function createSchemaProduct(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Product(
                id          INTEGER PRIMARY KEY,
                title       TEXT,
                descrition  TEXT NOT NULL,
                imgBanner   BLOB NOT NULL,
                idCategoria INTEGER NOT NULL,
                idImgGalerry INTEGER,
                price       REAL NOT NULL,
                FOREIGN KEY(idCategoria) REFERENCES category(id),
                FOREIGN KEY(idImgGalerry) REFERENCES galeryProduct(id)
            )
        ');
    }

    static function createSchemaAddress(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Address(
                id          INTEGER PRIMARY KEY,
                nameAddress
                street      TEXT NOT NULL,
                number      INTEGER NOT NULL,
                cep         TEXT NOT NULL,
                district    TEXT NOT NULL,
                country     TEXT NOT NULL,
                complement  TEXT
            )
        ');
    }

    static function createSchemaFavorites(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Favorites(
                idUser      INTEGER NOT NULL,
                idProduct   INTEGER NOT NULL,
                
                PRIMARY KEY(idUser,idProduct),
                FOREIGN KEY(idUser) REFERENCES Users(id),
                FOREIGN KEY(idProduct) REFERENCES Product(id)
                
            )
        ');
    }

    static function createSchemaCartShopping(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS CartShopping(
                idUser      INTEGER NOT NULL,
                idProduct   INTEGER NOT NULL,
                amount      INTEGER NOT NULL,
                
                PRIMARY KEY(idUser,idProduct),
                FOREIGN KEY(idUser) REFERENCES Users(id),
                FOREIGN KEY(idProduct) REFERENCES Product(id)
                
            )
        ');
    }

    static function createSchemaCards(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Cards(
                id          INTEGER NOT NULL,
                cardName    TEXT NOT NULL,
                CPF         INTEGER NOT NULL,
                cardNumber  INTEGER NOT NULL,
                CVV         INTEGER NOT NULL,

                idUser      INTEGER, 
                PRIMARY KEY(cardName,CPF,cardNumber,CVV),     
                FOREIGN KEY(idUser) REFERENCES Users(id)
                
            )
        ');
    }

    static function createSchemaPayments(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Payments(
                idPayments  INTEGER NOT NULL,
                idCard      INTEGER NOT NULL,
                idAddress   INTEGER NOT NULL,
                idUser      INTEGER,

                PRIMARY KEY(idPayments),

                FOREIGN KEY(idCard) REFERENCES Cards(id)
                FOREIGN KEY(idUser) REFERENCES Users(id)
                FOREIGN KEY(idAddress) REFERENCES Address(id)
                
            )
        ');
    }

    static function selectShema($table,$instrution){
        $result = this->pdo->query("SELECT $table FROM $instrution");
        return $result;
    }

    static function printSchema($table){
        foreach($result as $row){
            print $row[$table] . "\n";
        }
    }

}

// if(!isset(self::$pdo)){
//     self::$pdo = new PDO("sqlite:cartuning.sqlite"); // Selecionar tipo de linguagem do banco
//     self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);
// }

?>

