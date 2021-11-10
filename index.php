<?php
    include_once __DIR__ . '/libs/Router.php';
    
    // Database
    include_once ('dao/Database.php');
    
    // Controllers
    include_once ('app/Controller/Auth.php');
    include_once ('app/Controller/Admin.php');
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
    include_once ('app/Controller/Search.php');
    
    // Use this namespace
    use Steampixel\Route;

    Database::getConnection();
    Database::createSchemaUser();
    Database::createSchemaCategory();
    Database::createSchemaImgGalery();
    Database::createSchemaProduct();
    Database::createSchemaEvaluation();
    Database::createSchemaAddress();
    Database::createSchemaFavorites();
    Database::createSchemaCartShopping();
    Database::createSchemaCards();
    Database::createSchemaPayments();

    // Percistir tabelas banco de dados
    // Database::inflateDB();

    session_start();
    // Auth::validation();

    // Add your first route
    Route::add('/', function() {
        $controller = new Home();
        $controller->home();
    },'get');

    // Add your first route
    Route::add('/admin', function() {
        $controller = new Admin();
        $controller->admin();
    },['get']);

    //Home
    Route::add('/home', function() {
        $controller = new Home();
        $controller->home();
    },'get');

    Route::add('/search([a-z-0-9-]*)', function($param) {
        $controller = new Search();
        $controller->search();
    },'get');

    Route::add('/search', function() {
        $controller = new Search();
        $controller->page();
    },'get');

    Route::add('/login', function() {
        if(Auth::validation()){
            $controller = new Profile();
            $controller->profile();
        }else{
            $controller = new Login();
            $controller->login();
        }
    },'get');

    Route::add('/recover', function() {
        $controller = new Login();
        $controller->recover();
    },['get','post']);

    Route::add('/recoverPass',function(){
        $controller = new Login();
        $controller->recoverPass();
    },['get','post']);

    Route::add('/logout', function() {
        $controller = new Profile();
        if(Auth::validation()){
            $controller->logout();
        }else{
            $controller->logout();
        }
    },'get');

    Route::add('/profile', function() {
        $controller = new Profile();
        $controller->loginAuth();
    },['get','post']);

    Route::add('/register', function() {
        $controller = new Login();
        $controller->registerUser();
    },'post');

    Route::add('/details/([0-9]*)', function($id) {
        $controller = new Details();
        $controller->details($id);
    },'get');

    Route::add('/addCart',function(){
        $controller = new Details();
        $controller->addCart();
    },'post');

    Route::add('/getUser',function(){
        $controller = new Admin();
        $controller->getUser();
    },'post');

    Route::add('/favorites', function() {
        $controller = new Favorites();
        $controller->favorites();
    },'get');

    Route::add('/listshopping([a-z-0-9-]*)', function($param) {
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
        include_once ('app/View/404/index.php');
    },['get','post']);

    // Run the router
    Route::run('/');
?>