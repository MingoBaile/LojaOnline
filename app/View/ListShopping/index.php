<?php 
    include_once ('app/Controller/Home.php');
    include_once ('app/Controller/Auth.php');
    include_once ('app/Controller/Details.php');
    include_once ('app/Controller/Favorites.php');
    include_once ('app/Controller/ListShopping.php');

    $categoria = $_GET['categoria'];
    $products = ListShopping::getProductCategory($categoria);
    $categoriaLink = Home::getCatagory();

    if(Auth::validation()){
        $IdUser = $_SESSION['user']->getEmail();
    }else{
        $IdUser = '';
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Listagem categoria</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/ListShopping/style.css">
    <script src="../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top >
        <a href="../Home" slot="brand">
            <img src="../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <?php include_once('components/Search/Search.php') ?>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <div class="sub-catgoria">
        <ul>
            <?php foreach($categoriaLink as $link){?>
                <li>
                    <a href="../Listshopping?categoria=<?= $link['title'] ?>"><?= $link['title'] ?></a>
                </li>
            <?php }?>
        </ul>
    </div>
    <main>
        <div class="wrapper-container">
            <section class="flex row  gap-3 justify-between">
                <button class="px-3 btnHome"><i data-feather="home"></i></button>
                <div class="lead-actions flex gap-3">
                    <button class="px-3"><i data-feather="server"></i>
                        <i data-feather="grid"></i></button>
                    <button class="px-3"><i data-feather="filter"></i></button>
                </div>
            </section>
            <h4 class="heading"><?= $categoria ?></h4>
            <section class="list-products">
                <?php foreach($products as $product){?>
                    <div class="card-product" id="<?= $product->getId() ?>">
                        <div class="picture">
                            <span class="flex row justify-end">
                                <a class="btn px-2 <?= Favorites::isFavorites($IdUser,$product->getId()) ? "is-favorite" : ""?>" href="../AddFavorites?q=<?= $product->getId()?>"><i data-feather="heart"></i></a>
                            </span>
                            <img src="../<?= $product->getImgBanner() ?>" alt="">
                            <div class="galeria hover-only">
                                <?php foreach(Details::getImgs($product->getId()) as $key => $imgs){?>
                                    <span>
                                        <img src="<?= $imgs ?>">
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="body">
                            <a class="information" href="../Details/<?= $product->getId()?>">
                                <h5><?= $product->getTitle() ?></h5>
                                <p><?= $product->getDescrition() ?></p>
                            </a>
                            <div class="value hover-only">
                                <span class="flex row  align-center gap-3">
                                    <i data-feather="dollar-sign"></i>
                                    <span class="flex column gap-1 align-start values">
                                        <small><?= $product->getPrice() ?></small>
                                        <strong class="price"><?= $product->getPrice() ?></strong>
                                    </span>
                                </span>
                                <div class="actions-card">
                                    <a class="btn px-3 list-is-visible <?= Favorites::isFavorites($IdUser,$product->getId()) ? "is-favorite" : ""?>" href="../AddFavorites?q=<?= $product->getId()?>"><i data-feather="heart"></i></a>
                                    <a class="btn px-3 <?= Favorites::isCartShopping($IdUser,$product->getId()) ? "is-favorite" : ""?>" href="../AddCart?q=<?= $product->getId()?>"><i data-feather="shopping-cart"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php }?>
            </section>
        </div>
        <?php if(!$product){?>
            <footer class="w-100 pb-4">
                <button class="w-100">Continuar carregando</button>
            </footer>
        <?php }?>
    </main>
    <nav class="navigation-bottom">
        <span>
            <a href="../Home"><i class="icon-1" data-feather="home"></i></a>
        </span>
        <span>
            <a href="../Search"><i class="icon-1" data-feather="search"></i></a>
        </span>
        <span>
            <a href="../Favorites"><i class="icon-1" data-feather="heart"></i></a>
        </span>
        <span>
            <a href="../Cartshopping"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="../app/View/ListShopping/script.js" defer></script>
<script src="../scripts/index.js" defer></script>
</body>
</html>