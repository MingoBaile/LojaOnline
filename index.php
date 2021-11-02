<?php
    require_once __DIR__ . '/libs/Router.php';
    
    // Database
    include_once ('dao/Database.php');
    

    // Controllers
    include_once ('app/Controller/Auth.php');
    include_once ('app/Controller/Home.php');
    include_once ('app/Controller/Login.php');
    include_once ('app/Controller/Address.php');
    include_once ('app/Controller/CartShopping.php');
    include_once ('app/Controller/Details.php');
    include_once ('app/Controller/Favorites.php');
    include_once ('app/Controller/ListShopping.php');
    include_once ('app/Controller/Payments.php');
    include_once ('app/Controller/Profile.php');
    include_once ('app/Controller/OrderFinish.php');
    include_once ('app/Controller/Resume.php');
    
    // Use this namespace
    use Steampixel\Route;

    Database::getConnection();
    Database::createSchemaUser();
    Database::createSchemaCategory();
    Database::createSchemaImgGalery();
    Database::createSchemaProduct();
    Database::createSchemaAddress();
    Database::createSchemaFavorites();
    Database::createSchemaCartShopping();
    Database::createSchemaCards();
    Database::createSchemaPayments();

    foreach(Database::userAll() as $user){
        var_dump($user['name']);
    }

    foreach(Database::productAll() as $product){
        var_dump($product);
    }

    foreach(Database::favoritesAll() as $favorite){
        var_dump($favorite);
    }

    // Database::inflateDB();

    
    

    session_start();
    Auth::validation();

    // Add your first route
    Route::add('/', function() {
        $controller = new Home();
        $controller->home();
    },'get');

    //Home
    Route::add('/home', function() {
        $controller = new Home();
        $controller->home();
    },'get');

    Route::add('/login', function() {
        $controller = new Login();
        $controller->login();
    },'get');

    Route::add('/logout', function() {
        $controller = new Profile();
        $controller->logout();
    },'get');

    Route::add('/profile', function() {
        $controller = new Profile();
        $controller->loginAuth();
    },['get','post']);

    Route::add('/register', function() {
        $controller = new Login();
        $controller->registerUser();
    },'post');

    Route::add('/details', function() {
        $controller = new Details();
        $controller->details();
    },'get');

    Route::add('/favorites', function() {
        $controller = new Favorites();
        $controller->favorites();
    },'get');

    Route::add('/listshopping', function() {
        $controller = new ListShopping();
        $controller->listshopping();
    },'get');

    Route::add('/orderfinish', function() {
        $controller = new OrderFinish();
        $controller->orderfinish();
    },'get');

    Route::add('/payments', function() {
        $controller = new Payments();
        $controller->payments();
    },'get');

    Route::add('/address', function() {
        $controller = new Address();
        $controller->address();
    },'get');

    Route::add('/resume', function() {
        $controller = new Resume();
        $controller->resume();
    },'get');

    Route::add('/cartshopping', function() {
        $controller = new CartShopping();
        $controller->cartshopping();
    },'get');

    Route::add('/.*', function() {
        http_response_code(404);
        echo "Pagina não encontrada!";
    },['get','post']);

    // Run the router
    Route::run('/');
?>