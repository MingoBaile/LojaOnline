<?php 
    
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
            <h4 class="heading">Lista de Carrinho</h4>
            <section class="list-cart">
                <article class="cart-item">
                     <img src="../assets/img-products/car-opala-principal.jpg" alt="Imagem do produto - Kit Opala - 6 cilindros">
                     <div class="cart-descrition">
                        <h4>Kit Opala SS - 6 cilindros </h4>
                        <p>Opala SS 1979 Original 2.5...</p>
                     </div>
                     <div class="cart-unidade">
                        <label for="unidade">Unidade</label>
                        <h3>R$ 459,99</h3>
                        <strong>R$ 500,00</strong>
                     </div>
                     <div class="cart-quantidade">
                         <div class="input-number">
                             <button class="ghost px-2"><i data-feather="minus"></i></button>
                            <input type="number" name="quantidade" id="quantidade" min="1" value="1">
                            <button class="ghost px-2"><i data-feather="plus"></i></button>
                         </div>
                     </div>
                     <div class="tot">
                         <label for="tot">Total</label>
                         <h3>R$ 459,99</h3>
                     </div>
                     <div class="actions">
                         <button class="px-4"><i data-feather="heart"></i></button>
                         <button class="px-4"><i data-feather="trash"></i></button>
                     </div>
                </article>
                <article class="cart-tot">
                    <div class="desc-total">
                        <label for="tot">Total descontos</label>
                        <h5>000,00</h5>
                    </div>
                    <div class="sub-total">
                        <label for="tot">Total</label>
                        <h5>1.000,00</h5>
                    </div>
                </article>
            </section>
        </div>
        <footer class="w-100 flex justify-end gap-3">
            <button>Continuar comprando</button>
            <button class="primary">Finalizar compra<i data-feather="arrow-right"></i></button>
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