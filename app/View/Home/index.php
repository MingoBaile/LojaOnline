<?php 
    include_once ('app/Controller/Home.php');
    include_once ('app/Controller/Details.php');

    $json = file_get_contents("app/View/Home/data.json");
    $data = json_decode($json);
    $products = Home::getProducts();
    $categoria = Home::getCatagory();


    // Search product examples return array output
    // $product = Home::getProduct("F");
    // foreach($products as $item){
    //     var_dump($item->getTitle());
    //     die();
    // }
    


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Home</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/Home/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top >
        <a href="#" slot="brand" class="onVibrate">
            <img src="../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <?php include_once('components/Search/Search.php') ?>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login" class="btn ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites" class="btn ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping" class="btn ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <main>
        <div class="wrapper-container">
            <h4 class="heading">Categorias</h4>
            <section class="list-categorias">
                <?php foreach($categoria as $key => $item){?>
                    <a href="../listshopping?categoria=<?= $item['title'] ?>" class="categoira" id="<?= $item['id'] ?>">
                        <label><?= $item['title']?></label>
                        <span class="hover-only">Acessar<i data-feather="arrow-right"></i></span>
                        <img src="../<?= $item['img'] ?>" alt="Categoria de <?= $item['title']?>" title="<?= $item['title']?>">
                    </a>
                <?php }?>
            </section>
            <h4 class="heading">Últimos adicionados</h4>
            <section class="list-products">
                <?php foreach($products as $key => $product){?>
                    <div class="card-product" id="<?= $product->getId() ?>">
                        <div class="picture">
                            <span class="flex row justify-end">
                                <button class="px-4 <?= $product->favorite=="true" ? "is-favorite":""?>"><i data-feather="heart"></i></button>
                            </span>
                            <img src="../<?= $product->getImgBanner() ?>" alt="<?= $product->getTitle() ?>">
                            <div class="galeria hover-only">
                                <?php foreach(Details::getImgs($product->getId()) as $key => $imgs){?>
                                    <span>
                                        <img src="../<?= $imgs ?>">
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
                                        <small><?= ($product->getPrice() + 100*6) ?></small>
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
        </div>
        <footer class="w-100 pb-4">
            <button class="w-100">Continuar carregando</button>
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
            <a href="../Cartshopping"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="../app/View/Home/script.js" defer></script>
</body>
</html>