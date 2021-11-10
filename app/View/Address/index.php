<?php 
    
?>
<!DOCTYPE html>
<html lang="en">
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
        
        <h4 class="heading">Selecionar a forma de pagamento</h4>        
        
        <div class="wrapper-container">
            <section class="sessioncards">
                <div class="list-cads">
                    <div class="dcards">
                        <INPUT TYPE="RADIO" NAME="cads" VALUE="op1">
                        <div class="body">
                            <span class="scards">  
                                <h5>Casa principal</h5>
                                <strong>Rua, Bairro - n41 79000-000</strong>
                                <small>Complemeto</small>       
                            </span>
                        </div>
                        <div class="value hover-only">
                            <div class="actions-card">
                                <button class="px-3"><i data-feather="trash"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="dcards">
                        <INPUT TYPE="RADIO" NAME="cads" VALUE="op2">
                        <div class="body">
                            <span class="scards">  
                                <h5>Casa secondaria</h5>
                                <strong>Rua, Bairro - n41 79000-000</strong>
                                <small>Complemeto</small>
                            </span>
                        </div>
                        <div class="value hover-only">
                            <div class="actions-card">
                                <button class="px-3"><i data-feather="trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-cads">
                    <h4 class="heading">Adicionar endereço</h4>
                    <p>Cadastro um endereço para receber suas compras!</p>
                    <div class="dadd-cads flex column gap-3 mb-3">
                        <div class="input-group w-100">
                            <label class="class-label">Nome impresso no cartão</label>
                            <input type="text" placeholder="ex: GILSON J SANTOS">
                        </div>
                        <div class="input-group w-100">
                            <label class="class-label">Nome para endereço</label>
                            <input type="text" placeholder="Casa principal">
                        </div>
                        <div class="details-cards w-100">
                            <div class="dadd-cads">
                                <label class="class-label">CEP</label>
                                <input type="text" placeholder="79000-000">
                            </div>
                            <div class="dadd-cads w-100">
                                <label class="class-label" for="estado">Estado</label>
                                <select name="estado" id="estado">
                                    <option value="ms">MS</option>
                                    <option value="ms">SP</option>
                                </select>
                            </div> 
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="cidade">Cidade</label>
                            <select name="cidade" id="cidade">
                                <option value="ms">Campo Grande</option>
                            </select>
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="bairro">Bairro</label>
                            <input type="text" placeholder="Bairro...">
                        </div>
                        <div class="details-cards w-100">
                            <div class="input-group w-100">
                                <label class="label" for="cidade">Logradouro</label>
                                <input type="text" placeholder="Bairro...">
                            </div>
                            <div class="input-group w-100">
                                <label class="label" for="cidade">Número</label>
                                <input type="text" placeholder="100">
                            </div>
                        </div>
                        <div class="input-group w-100">
                            <label class="label" for="cidade">Complemento</label>
                            <input type="text" placeholder="Ap. 00001">
                        </div>
                    </div>
                    <div class="dactions-card">
                        <button class="px-3">Cancelar</i></button>
                        <button class="primary">Cadastrar<i data-feather="plus"></i></button>
                    </div>
                </div>

                <div class="call-add-cads">
                    <button class="tertiary call-add-cads">Adicionar cartão<i data-feather="plus"></i></button>
                </div>
            </section>
            <section class="account">
                <div class="account-data">
                    <div class="flex row ">
                        <img src="../assets/img-products/car-opala-principal.jpg" class="w-25" alt="Opala">
                        <button class="white view-more"><i data-feather="trash"></i></button>
                    </div>
                    <div class="flex column">
                        <h4>Kit Opala SS - 6 cilindros</h4>
                        <p>Opala SS 1979 Original 2.5...</p>
                    </div>
                    <div class="flex row align-center gap-3">
                        <i data-feather="dollar-sign"></i>
                        <div class="flex column gap-2">
                            <small>Total</small>
                            <strong>R$ 345,00</strong>
                        </div>
                    </div>
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