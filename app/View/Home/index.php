<?php 
    $product = require_once('../../app/Model/Product.php');
    $json = file_get_contents("data.json");
    $data = json_decode($json);
    $products = $data->products;
    $categoria = $data->categoria;

    
    $product = new Product();

    $product.insertProduct(
        "Kit Opala SS - 6 cilindros",
    "Kits turbos",
    "Opala SS 1979 Original 2.5",
    "true",
    "1.500,00",
    "../../assets/img-products/car-opala-principal.jpg",
    [   "../../assets/img-products/car-opala-1.jpg",
        "../../assets/img-products/car-opala-2.jpg",
        "../../assets/img-products/car-opala-3.jpg"]);

    var_dump($product);

    // foreach ($products as $key => $value){
    //     print $value->title;
    // }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Home</title>
    <link rel="stylesheet" href="./style.css">
    <script src="../../scripts/index.js" defer></script>
    <script src="../../components/Navigation/index.js" defer></script>
</head>
<body>
    <navigation-top >
        <a href="#" slot="brand" class="onVibrate">
            <img src="../../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <input type="search" placeholder="Pesquise o seu kit ou peça" slot="search" class="w-100"/>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login/" class="btn ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites/" class="btn ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping/" class="btn ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <main>
        <div class="wrapper-container">
            <h4 class="heading">Categorias</h4>
            <section class="list-categorias">
                <?php foreach($categoria as $key => $item){?>
                    <a href="<?= $item->url?>" class="categoira" id="<?= $item->title?>">
                        <label><?= $item->title?></label>
                        <span class="hover-only">Acessar<i data-feather="arrow-right"></i></span>
                        <img src="<?= $item->img?>" alt="Categoria de <?= $item->title?>" title="<?= $item->title?>">
                    </a>
                <?php }?>
            </section>
            <h4 class="heading">Últimos adicionados</h4>
            <section class="list-products">
                <?php foreach($products as $key => $item){?>
                    <div class="card-product">
                        <div class="picture">
                            <span class="flex row justify-end">
                                <button class="px-4 <?= $item->favorite=="true" ? "is-favorite":""?>"><i data-feather="heart"></i></button>
                            </span>
                            <img src="<?= $item->imgBanner?>" alt="<?= $item->title?>">
                            <div class="galeria hover-only">
                                <?php foreach($item->imgsGalery as $key => $imgs){?>
                                    <span>
                                        <img src="<?= $imgs ?>" alt="<?= $item->title?>">
                                    </span>
                                <?php }?>
                            </div>
                        </div>
                        <div class="body">
                            <a class="information" href="../Details/">
                                <h5><?= $item->title?></h5>
                                <p><?= $item->descrition?></p>
                            </a>
                            <div class="value hover-only">
                                <span class="flex row  align-center gap-3">
                                    <i data-feather="dollar-sign"></i>
                                    <span class="flex column gap-1 align-start values">
                                        <small><?= $item->price?></small>
                                        <strong class="price"><?= $item->price?></strong>
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
            <a href="../Home/index.php"><i class="icon-1" data-feather="home"></i></a>
        </span>
        <span>
            <a href="../Search/"><i class="icon-1" data-feather="search"></i></a>
        </span>
        <span>
            <a href="../Favorites/"><i class="icon-1" data-feather="heart"></i></a>
        </span>
        <span>
            <a href="../Cartshopping/"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login/"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="./script.js" defer></script>
</body>
</html>