<?php
    include_once ('app/Controller/Auth.php');
    include_once ('app/Controller/Details.php');
    include_once ('app/Controller/Favorites.php');
    include_once ('app/Controller/ListShopping.php');

    $products = $_POST['search'];

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
    <title>Cartunings | Search</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="app/View/Search/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top style="width: 100%;">
        <a href="../Home/" slot="brand">
            <img src="assets/brand-white.svg" alt="Cartunings logo" height="40" aria-label="">
        </a>
        <!-- <input type="search" id="search" placeholder="Pesquise o seu kit ou peça" slot="search" class="w-100"> -->
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login" class="btn  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites" class="btn  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping" class="btn  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>

    <main>
        <aside class="search">
            <h4 class="heading">Buscar produto</h4>
            <?php include_once('components/Search/Search.php') ?>
        </aside>
        <section class="wrapper-container">
            <section class="flex row  gap-3 justify-between align-center">
                <h4 class="heading">Resultado de pesquisa</h4>
                <div class="lead-actions flex gap-3">
                    <button class="px-3"><i data-feather="server"></i><i data-feather="grid"></i></button>
                </div>
            </section>
            
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
                                    <a class="btn px-2 list-is-visible <?= Favorites::isFavorites($IdUser,$product->getId()) ? "is-favorite" : ""?>" href="../AddFavorites?q=<?= $product->getId()?>"><i data-feather="heart"></i></a>
                                    <a class="btn" href="../AddCart?q=<?= $product->getId()?>"><i data-feather="shopping-cart"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php }?>
            </section>
        </section>
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
<script src="app/View/Search/script.js" defer></script>
</body>
</html>

