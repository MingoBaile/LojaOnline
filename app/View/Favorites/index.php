<?php 
    $products = $_POST['products'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Favorites</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/Favorites/style.css">
    <script src="../../../scripts/index.js" defer></script>
    <script src="../../../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top >
        <a href="../Home" slot="brand">
            <img src="../../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <?php include_once('components/Search/Search.php') ?>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Cartshopping" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <main>
        <section class="wrapper-container">
            <h4 class="heading">Lista de Favoritos</h4>
            <section class="list-products">
                <?php foreach($products as $product){?>
                    <div class="card-product">
                        <div class="picture">
                            <img src="./<?= $product->getImgBanner()?>" alt="">
                        </div>
                        <div class="body">
                            <a class="information" href="#product">
                                <h5><?=$product->getTitle()?></h5>
                                <p><?=$product->getDescrition()?></p>
                            </a>
                        </div>
                        <div class="value">
                            <div class="actions-card">
                                <a class="btn px-3" href="../Favorites/AddCart?q=<?=$product->getId()?>"><i data-feather="shopping-cart"></i></a>
                                <a class="btn px-3" href="../Favorites/ShareProduct?q=<?=$product->getId()?>"><i data-feather="share-2"></i></a>
                                <a class="btn px-3" href="../Favorites/Remove?q=<?=$product->getId()?>"><i data-feather="trash"></i></a>
                            </div>
                            <a href="../Details/<?=$product->getId()?>" class="btn tertiary">Ver Detalhes</a>
                        </div>
                    </div>
                <?php }?>
            </section>
            <footer>
                <a class="btn" href="../Home"><i data-feather="arrow-left"></i>Voltar</a>
                <?php if(isset($products)){?>
                    <a class="btn secondary" href="../Favorites/RemoveAll"><i data-feather="trash"></i>Limpar favoritos</a>
                <?php }?>
            </footer>
        </section>
    </main>
    <nav class="navigation-bottom">
        <span>
            <a href="../Home/index.php"><i class="icon-1" data-feather="home"></i></a>
        </span>
        <span>
            <a href="../Search/"><i class="icon-1" data-feather="search"></i></a>
        </span>
        <span>
            <a href="../Cartshopping/"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="../app/View/Favorites/script.js" defer></script>
</body>
</html>