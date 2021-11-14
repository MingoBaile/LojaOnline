<?php 
    include_once ('app/Controller/Address.php');
    $products = $_SESSION['order'];
    $address = Address::getAddressAll($_SESSION['user']->getEmail());
    unset($_SESSION['order']);
    unset($_SESSION['address']);
    $_SESSION['order'] = $products;
    $_SESSION['address'] = $address;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Endereço</title>
    <link rel="stylesheet" media="all" onload="if(media!='all')media='all'" href="../app/View/Address/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
    <?php include_once('components/LoadFiles/LoadFiles.php');?>
</head>
<body>
    <navigation-top >
        <a href="#home" slot="brand">
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
            <span class="step-item active"><i data-feather="check"></i>Endereço</span>
            <span class="step-item"><i data-feather="dollar-sign"></i>Pagamento</span>
            <span class="step-item"><i data-feather="check"></i>Resumo</span>
        </div>
        
        <h4 class="heading">Selecionar o endereço</h4>
        
        <div class="wrapper-container">
            <section class="sessioncards">
                <?php if($address == NULL){ } else{?>
                <div class="list-cads">
                    <?php foreach($address as $key => $addr){?>
                        <div class="dcards">
                            <input type="radio" id="<?= $addr->getNameAddress()?>" name="<?= $addr->getNameAddress()?>" value="<?= $addr->getNameAddress()?>">
                            <div class="body">
                                <span class="scards">  
                                    <h5><?= $addr->getNameAddress()?></h5>
                                    <strong><?= $addr->getDistrict() .','.$addr->getStreet().' - '.$addr->getNumber().', '.$addr->getCep()?></strong>
                                    <small><?= $addr->getState()?> - <?= $addr->getCountry()?></small>
                                </span>
                            </div>
                            <div class="value hover-only">
                                <div class="actions-card">
                                    <a class="btn small px-1" href="../Address/Remove?id=<?=$key+1?>?cep=<?= $addr->getCep()?>?number=<?= $addr->getNumber()?>"><i data-feather="trash"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <?php }?>
                <div class="add-cads">
                    <h4 class="heading">Adicionar endereço</h4>
                    <p>Cadastro um endereço para receber suas compras!</p>
                    <form class="dadd-cads flex column gap-3 mb-3" action="../Address/insertAddress" method="POST">
                        <div class="input-group w-100">
                            <label class="class-label">Nome para endereço</label>
                            <input type="text"name="nameAddress" required id="nameAddress" placeholder="Casa principal">
                        </div>
                        <div class="details-cards w-100">
                            <div class="dadd-cads">
                                <label class="class-label">CEP</label>
                                <input required type="number" name="cep"  id="cep" placeholder="79000-000">
                            </div>
                            <div class="dadd-cads w-100">
                                <label class="class-label" for="estado">Estado</label>
                                <select required name="state" id="state">
                                    <option value="" disabled="disabled" selected="selected">Selecione o estado</option>
                                    <option value="ms">MS</option>
                                    <option value="sp">SP</option>
                                    <i class="icon-1" data-feather="chevron-down"></i>
                                </select>
                            </div> 
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="cidade">Cidade</label>
                            <select required name="country" id="country">
                                <option value="" disabled="disabled" selected="selected">Selecione a cidade</option>
                                <option value="bt">Bonito</option>
                                <option value="cg">Campo Grande</option>
                                <option value="dr">Dourados</option>
                                <option value="ag">Angélica</option>
                                <i class="icon-1" data-feather="chevron-down"></i>
                            </select>
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="bairro">Bairro</label>
                            <input required type="text" name="district" id="district" placeholder="Bairro...">
                        </div>
                        <div class="details-cards w-100">
                            <div class="input-group w-100">
                                <label class="label" for="cidade">Logradouro</label>
                                <input required type="text" name="street" id="street" placeholder="Rua...">
                            </div>
                            <div class="input-group w-100">
                                <label class="label" for="cidade">Número</label>
                                <input required type="number" name="number" id="number" placeholder="100">
                            </div>
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="cidade">Complemento</label>
                            <input required type="text" name="complement" id="complement" placeholder="Ap. 00001">
                        </div>
                        <div class="dactions-card w-100 justify-end mt-2">
                            <button class="px-3" type="reset"><i data-feather="trash"></i>Limpar</i></button>
                            <button class="primary" type="submit">Cadastrar<i data-feather="plus"></i></button>
                        </div>
                    </form>
                </div>
                <!-- <div class="call-add-cads">
                    <button class="tertiary call-add-cads">Adicionar cartão<i data-feather="plus"></i></button>
                </div> -->
            </section>
            <section class="account">
                <div class="products">
                    <div class="tile">
                        <h4>Produtos</h4>
                        <a href="../Cartshopping" class="btn small"><i data-feather="edit" class="icon-1"></i></a>
                    </div>
                    <?php foreach($products as $key => $product){ ?>
                        <article class="account-data">
                            <img src="../<?=$product->getImgBanner()?>" alt="<?=$product->getTitle()?>">
                            <div class="body">
                                <h4><?=$product->getTitle()?></h4>
                                <p><?=$product->getDescrition()?></p>
                            </div>
                        </article>
                    <?php }?>
                </div>
                <div class="finish">
                    <a href="../CartShopping" class="btn"><i data-feather="arrow-left"></i>Voltar</a>
                    <a href="../Payments" class="btn primary">Continuar<i data-feather="arrow-right"></i></a>
                </div>
            </section>
        </div>
    </main>
<script src="../app/View/Address/script.js" defer></script>
</body>
</html>