<?php 
    include_once ('app/Controller/Home.php');
    include_once ('app/Controller/Auth.php');
    include_once ('app/Controller/Details.php');
    include_once ('app/Controller/Favorites.php');
    include_once ('app/Controller/ListShopping.php');

    $products = $_POST['products'];
    $tot = 0;
    $subtot = 0;
    unset($_SESSION['order']);
    $_SESSION['order'] = $products;

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
    <title>Cartunings | CartShopping</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/Cartshopping/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top >
        <a href="../Home" slot="brand">
            <img src="../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <?php include_once('components/Search/Search.php') ?>
        <div slot="actions" class="actions flex row gap-3 center">
            <a href="../Login" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
        </div>
    </navigation-top>
    <main>
        <div class="wrapper-container">
            <?php if(!empty($products)){ ?>
                <h4 class="heading">Lista de Carrinho</h4>
            <?php }?>
            <?php if(empty($products)){ ?>
                <p>Não há produtos no carrinho!</p>
            <?php }?>
            <section class="list-cart">
                <?php foreach($products as $product){?>
                    <?php
                        $tot += $product->getPrice()*Favorites::getAmount($IdUser,$product->getId());
                        $subtot += ($product->getPrice() + 100*6)*Favorites::getAmount($IdUser,$product->getId());
                    ?>
                    <div class="hide">
                        <input type="hidden" name="" id=""/>
                        <input type="hidden" name="" id=""/>
                        <input type="hidden" name="" id=""/>
                        <input type="hidden" name="" id=""/>
                        <input type="hidden" name="" id=""/>
                    </div>
                    <?php if($product == NULL) {?> <?php }else{?>
                        <article class="cart-item">
                            <img src="../<?=$product->getImgBanner()?>" alt="<?=$product->getTitle()?>">
                            <div class="cart-descrition">
                                <h4><?=$product->getTitle()?></h4>
                                <p><?=$product->getDescrition()?></p>
                            </div>
                            <div class="cart-unidade">
                                <label for="unidade">Unidade</label>
                                <h3><?=$product->getPrice()?></h3>
                                <strong><?= ($product->getPrice() + 100*6) ?></strong>
                            </div>
                            <div class="cart-quantidade">
                                <div class="input-number">
                                    <button class="ghost px-2"><i data-feather="minus"></i></button>
                                    <input type="number" name="quantidade" id="quantidade" min="1" value="<?=Favorites::getAmount($IdUser,$product->getId())?>">
                                    <button class="ghost px-2"><i data-feather="plus"></i></button>
                                </div>
                            </div>
                            <div class="tot">
                                <label for="tot">Total</label>
                                <h3>R$ <?=Favorites::getAmount($IdUser,$product->getId())*$product->getPrice()?></h3>
                            </div>
                            <div class="actions">
                                <a style="padding-left:0;padding-right:0;" class="btn  <?= Favorites::isFavorites($IdUser,$product->getId()) ? "is-favorite" : ""?>" href="../AddFavorites?q=<?= $product->getId()?>"><i data-feather="heart" class="icon-1"></i></a>
                                <a style="padding-left:0;padding-right:0;" class="btn" href="../CartShopping/Remove?q=<?= $product->getId()?>"><i data-feather="trash" class="icon-1"></i></a>
                            </div>
                        </article>
                    <?php }?>
                <?php }?>
                <?php if(!empty($products)){ ?>
                    <article class="cart-tot">
                        <div class="desc-total">
                            <label for="tot">Total descontos</label>
                            <h5 data-subtot="<?=$subtot?>">R$ <?=$subtot?></h5>
                        </div>
                        <div class="sub-total">
                            <label for="tot">Total</label>
                            <h5 data-tot="<?=$tot?>">R$ <?=$tot?></h5>
                        </div>
                    </article>
                <?php }?>
            </section>
        </div>
        <footer class="w-100 flex justify-end gap-3">
            <?php if(empty($products)){ ?>
                <a class="btn" href="../Home"><i data-feather="arrow-left"></i>Voltar</a>
            <?php } else { ?>
                <a class="btn" href="../Home">Continuar comprando</a>
                <a class="btn primary" href="../Checkout/neworder">Finalizar compra<i data-feather="arrow-right"></i></a>
            <?php }?>
        </footer>
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
            <a href="../Login"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="../app/View/CartShopping/script.js" defer></script>
</body>
</html>