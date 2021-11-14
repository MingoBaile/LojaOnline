<?php 
    $user = $_SESSION['user'];
    $products = $_SESSION['order'];
    $address = $_SESSION['address'];
    $desc = 0;
    $subtot = 0;
    $tot =0;
    foreach($products as $product){
        $tot += $product->getPrice();
        $subtot += ($product->getPrice() + 100*6);
    }
    $finc = array();
    array_push($finc,$tot);
    array_push($finc,$subtot);
    unset($_SESSION['order']);
    unset($_SESSION['address']);
    $_SESSION['order'] = $products;
    $_SESSION['address'] = $address;
    $_SESSION['finc'] = $finc;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cartunings | Resume</title>
        <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/Resume/style.css">
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
            <div slot="actions" class="actions flex gap-3 center">
                <a href="../Login" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
                <a href="../Favorites" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
                <a href="../Cartshopping" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
            </div>
        </navigation-top>
        <main>
            <div class="cabecalhostatus">
                <span class="step-item check"><i data-feather="check"></i>Endereço</span>
                <span class="step-item check"><i data-feather="dollar-sign"></i>Pagamento</span>
                <span class="step-item active"><i data-feather="check"></i>Resumo</span>
            </div>
            <h4 class="heading">Resumo da Compra</h4>

            <section class="wrapper-container">
                <Section class="sessioncards">
                    <div class="account-data">
                        <h4 class="heading">Dados da conta</h4>
                        <div class="daccount-data mt-3">
                            <span class="name">
                                <small>Nome</small>
                                <strong><?=$user->getName();?></strong>
                            </span>
                            <span class="email">
                                <small>E-mail </small>
                                <strong><?=$user->getEmail();?></strong>
                            </span>
                        </div>
                        <!-- <div>
                            <button class="white view-more"><i data-feather="arrow-down"></i>Ver mais</i></button>
                        </div> -->
                    </div>
                    <div class="account-data">
                        <h4 class="heading">Endereço</h4>
                        <div class="endereco mt-3">        
                            <span class="sendereco">  
                                <small>Nome endereço</small>
                                <strong><?=$address[0]->getNameAddress()?></strong>  
                            </span>
                            <span class="cep">  
                                <small>CEP</small>
                                <strong><?=$address[0]->getCep()?></strong>  
                            </span>
                        </div>
                        <div class="endereco mt-3">
                            <span class="logradouro">  
                                <small>Logradouro</small>
                                <strong><?=$address[0]->getStreet()?></strong>  
                            </span>
                            <span class="numero">  
                                <small>Número</small>
                                <strong><?=$address[0]->getNumber()?></strong>  
                            </span>
                        </div>
                        <!-- <div>
                            <button class="white view-more"><i data-feather="arrow-down"></i>Ver mais</i></button>
                        </div> -->
                    </div>
                    <!-- <div class="account-data">
                        <h4 class="heading">Pagamento</h4>
                        <div class="dpagamento">        
                            <span class="spagamento">  
                                <small>Forma de pagamento</small>
                                <strong>Cartão</strong>  
                            </span>
                            <span class="snomeCartao">  
                                <small>Nome do cartão</small>
                                <strong>Cartão 1</strong>  
                            </span>
                            <span class="snumeroCartao">  
                                <small>Número do cartão</small>
                                <strong>**** **** **** *000</strong>  
                            </span>
                        </div>  
                        <div class="dpagamento">
                            <span class="sbandeira">  
                                <small>Bandeira</small>
                                <strong>Master Card 1</strong>  
                            </span>
                            <span class="scvv">  
                                <small>CVV</small>
                                <strong>***</strong>  
                            </span>
                        </div>                     
                        <div>
                            <button class="white view-more"><i data-feather="arrow-down"></i>Ver mais</i></button>
                        </div>                     
                    </div> -->
                </Section>
                <section class="list-products sessioncards">
                    <div class="products">
                        <div class="tile">
                            <h4>Produtos</h4>
                            <a href="../Cartshopping" class="btn small"><i data-feather="edit" class="icon-1"></i></a>
                        </div>
                        <?php foreach($products as $key => $product){ ?>
                            <article class="account-product">
                                <img src="../<?=$product->getImgBanner()?>" alt="<?=$product->getTitle()?>">
                                <div class="body">
                                    <h4><?=$product->getTitle()?></h4>
                                    <p><?=$product->getDescrition()?></p>
                                </div>
                            </article>
                        <?php }?>
                    </div>
                    <div class="amount">
                        <h4 class="heading">Valor Total</h4>
                        <div class="d-amount">
                            <span class="squantity">  
                                <div><small>Quantidade</small></div>
                                <div><strong><?=count($products)?></strong> </div>
                            </span>
                            <span class="discount">  
                                <div><small>Desconto</small></div> 
                                <div><strong class="price">- <?=$subtot-$tot?></strong></div>
                            </span>
                            <span class="subtotal">  
                                <div><small>Sub Total</small></div>
                                <div><strong class="price">R$ <?=$subtot?></strong>  </div>
                            </span>
                            <span class="total">  
                                <div><small>Total</small></div>
                                <div><strong class="price">R$ <?=$tot?></strong> </div> 
                            </span>
                        </div>
                    </div>
                    <span class="finish">
                        <a href="../Payments" class="btn"><i data-feather="arrow-left"></i>Volta</a>
                        <a href="../OrderFinish" class="btn primary">Finalizar Compra<i data-feather="arrow-right"></i></a>    
                    </span>
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
        <script src="../app/View/Resume/script.js" defer></script>
    </body>
</html>