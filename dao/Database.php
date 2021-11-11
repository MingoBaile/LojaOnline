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
            CREATE TABLE IF NOT EXISTS Category(
                id          INTEGER PRIMARY KEY,
                title       TEXT NOT NULL,
                img         BLOB NOT NULL,
                type        TEXT NOT NULL
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
                title       TEXT NOT NULL,
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

    static function createSchemaEvaluation(){
        $connect = self::getConnection();
        $connect->exec('
            CREATE TABLE IF NOT EXISTS Evaluation(
                idProduct   INTEGER NOT NULL,
                score       INTEGER NOT NULL,
                FOREIGN KEY(idProduct) REFERENCES Product(id)
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
                idUser      TEXT NOT NULL,
                idProduct   INTEGER NOT NULL
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

    static function userAll(){
        $connect = self::getConnection();
        $sql = $connect->prepare('SELECT * FROM `User`;');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    static function categoryAll(){
        $connect = self::getConnection();
        $sql = $connect->prepare('SELECT * FROM `Category`;');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    static function productAll(){
        $connect = self::getConnection();
        $sql = $connect->prepare('SELECT * FROM `Product`;');
        $sql->execute();
        $data = $sql->fetchAll();
        return $data;
    }

    static function inflateDB(){
        $connect = self::getConnection();
        // Inflate Product
        $sqlProduct = 'INSERT INTO Product(`title`,`descrition`,`imgBanner`,`idCategoria`,`idImgGalerry`,`price`) VALUES(:title,:descrition,:imgBanner,:idCategoria,:idImgGalerry,:price);';
        $sql = $connect->prepare($sqlProduct);
        $sql->bindValue(':title',"Opala SS");
        $sql->bindValue(':descrition',"Descrição do Opala SS");
        $sql->bindValue(':imgBanner','assets/img-products/car-opala-principal.jpg');
        $sql->bindValue(':idCategoria',1);
        $sql->bindValue(':idImgGalerry',0);
        $sql->bindValue(':price',1500.00);
        $sql->execute();

        $sql = $connect->prepare($sqlProduct);
        $sql->bindValue(':title',"Ferrari");
        $sql->bindValue(':descrition',"Descrição do Ferrari");
        $sql->bindValue(':imgBanner','assets/img-products/car-ferrari-principal.jpg');
        $sql->bindValue(':idCategoria',1);
        $sql->bindValue(':idImgGalerry',1);
        $sql->bindValue(':price',7800.00);
        $sql->execute();

        $sql = $connect->prepare($sqlProduct);
        $sql->bindValue(':title',"Fiat 147");
        $sql->bindValue(':descrition',"Descrição do Fiat 147");
        $sql->bindValue(':imgBanner','assets/img-products/car-fiat147-principal.jpg');
        $sql->bindValue(':idCategoria',2);
        $sql->bindValue(':idImgGalerry',2);
        $sql->bindValue(':price',2200.00);
        $sql->execute();

        $sql = $connect->prepare($sqlProduct);
        $sql->bindValue(':title',"Lancer");
        $sql->bindValue(':descrition',"Descrição do Lancer");
        $sql->bindValue(':imgBanner','assets/img-products/car-lancer-principal.jpg');
        $sql->bindValue(':idCategoria',3);
        $sql->bindValue(':idImgGalerry',4);
        $sql->bindValue(':price',4500.00);
        $sql->execute();

        $sqlEvaluation = 'INSERT INTO Evaluation(`idProduct`,`score`) VALUES(:idProduct,:score);';
        $sql = $connect->prepare($sqlEvaluation);
        $sql->bindValue(':idProduct',1);
        $sql->bindValue(':score',4);
        $sql->execute();

        $sql->bindValue(':idProduct',1);
        $sql->bindValue(':score',4);
        $sql->execute();

        $sql->bindValue(':idProduct',1);
        $sql->bindValue(':score',5);
        $sql->execute();

        $sqlGaleryProduct = 'INSERT INTO galeryProduct(`id`,`img`) VALUES(:id,:img);';
        $sql = $connect->prepare($sqlGaleryProduct);
        $sql->bindValue(':id',1);
        $sql->bindValue(':img','assets/img-products/car-opala-1.jpg');
        $sql->execute();

        $sql = $connect->prepare($sqlGaleryProduct);
        $sql->bindValue(':id',1);
        $sql->bindValue(':img','assets/img-products/car-opala-2.jpg');
        $sql->execute();

        $sql = $connect->prepare($sqlGaleryProduct);
        $sql->bindValue(':id',1);
        $sql->bindValue(':img','assets/img-products/car-opala-3.jpg');
        $sql->execute();

        $sqlFavorites = 'INSERT INTO Favorites(`idUser`,`idProduct`) VALUES(:idUser,:idProduct);';
        $sql = $connect->prepare($sqlFavorites);
        $sql->bindValue(':idUser',"gilsonjosert@gmail.com");
        $sql->bindValue(':idProduct',1);
        $sql->execute();

        $sql = $connect->prepare($sqlFavorites);
        $sql->bindValue(':idUser',"gilsonjosert@gmail.com");
        $sql->bindValue(':idProduct',2);
        $sql->execute();

        $sql = $connect->prepare($sqlFavorites);
        $sql->bindValue(':idUser',"gilsonjosert@gmail.com");
        $sql->bindValue(':idProduct',3);
        $sql->execute();

        $sqlCategory = 'INSERT INTO Category(`title`,`img`,`type`) VALUES(:title,:img,:type);';
        $sql = $connect->prepare($sqlCategory);
        $sql->bindValue(':title','Farou');
        $sql->bindValue(':img','assets/img-products/categorias/categoria-farou.jpg');
        $sql->bindValue(':type','farou');
        $sql->execute();

        $sql = $connect->prepare($sqlCategory);
        $sql->bindValue(':title','Kit');
        $sql->bindValue(':img','assets/img-products/categorias/categoria-kit.jpg');
        $sql->bindValue(':type','kit');
        $sql->execute();

        $sql = $connect->prepare($sqlCategory);
        $sql->bindValue(':title','Roda');
        $sql->bindValue(':img','assets/img-products/categorias/categoria-roda.jpg');
        $sql->bindValue(':type','roda');
        $sql->execute();

        $sql = $connect->prepare($sqlCategory);
        $sql->bindValue(':title','Turbo');
        $sql->bindValue(':img','assets/img-products/categorias/categoria-turbo.jpg');
        $sql->bindValue(':type','turbo');
        $sql->execute();


    }

}

// if(!isset(self::$pdo)){
//     self::$pdo = new PDO("sqlite:cartuning.sqlite"); // Selecionar tipo de linguagem do banco
//     self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXEPTION);
// }

?>

