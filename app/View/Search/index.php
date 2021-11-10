<?php
    $products = $_POST['search'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Search</title>
    <link rel="stylesheet" href="app/View/Search/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
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
            <h4 class="heading">Resultado de pesquisa</h4>
            <section class="list-products list"> 
                <?php foreach($products as $product){?>
                    <div class="card-product" id="<?= $product->getId() ?>">
                        <div class="picture">
                            <span class="flex row justify-end">
                                <button class="px-3"><i data-feather="heart"></i></button>
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
                                    <button class="px-3 list-is-visible"><i data-feather="heart"></i></button>
                                    <button class="px-3"><i data-feather="shopping-cart"></i></button>
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

