<?php 
    // https://www.php.com.br/instalacao-php-linux
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once '../../auth/auth_login.php';
        if(!auth_validate($_POST['nome'],$_POST['pass'])){
            header('Location: ../../pages/Login/index.html');
            die();
        }
        
        // require_once('../../../app/Model/Product.php');
        // $product = new Product();
        // $product->insertProduct('Produto 1','Descricao do produto','1.500,00');

        // encode json -> https://www.webtutorial.com.br/como-ler-um-arquivo-json-e-decodificar-para-um-objeto-php/
        $json = file_get_contents("data.json");
        $data = json_decode($json);

        // for($i=0;$i<count($data);$i++){
        //     print $data[$i]->id;
        // }
        // foreach ($data as $key => $value){
        //     print $value->id;
        // }
        // sleep(1);
        // header('Location: pages/Profile/index.php');
        // die();
        // function setTimeout($fn, $timeout){
        //     sleep(($timeout/1000));
        //     $fn();
        // }

        // $someFunctionToExecute = function() {
        //     header('Location: pages/Profile/index.php');
        //     die();
        // }
        // setTimeout($someFunctionToExecute, 3000);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Profile</title>
    <link rel="stylesheet" href="./style.css">
    <script src="../../scripts/index.js" defer></script>
    <script src="../../components/Navigation/index.js" defer></script>
</head>
<body>
    <navigation-top >
        <a href="#" slot="brand" class="onVibrate">
            <img src="../../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Login/index.html" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="user"></i></a>
            <a href="../Favorites/index.html" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping/index.html" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>
    <main>
        <aside class="aside-profile">
            <div class="card-perfil">
                <img src="../../assets/img-products/car-opala-principal.jpg" alt="Imagem ">
                <label><?php echo "{$_POST['nome']}" ?></label>
            </div>
            <div class="nav-link">
                <ul class="nav-upper">
                    <li>
                        <a href="#"><i data-feather="user"></i>Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i data-feather="package"></i>Pedidos</a>
                    </li>
                    <li>
                        <a href="#"><i data-feather="settings"></i>Configurações</a>
                    </li>
                </ul>
                <ul class="nav-below">
                    <li>
                        <a href="../Home/"><i data-feather="log-out"></i>Sair</a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <section class="profile-content">
            <h4>Bem-vindo, <?php echo "{$_POST['nome']}" ?>!</h4>
            <article class="section-content profile-grid">
                <div class="profile-grid-item">
                    <a href=""><i data-feather="user"></i>Perfil</a>
                </div>
                <div class="profile-grid-item">
                    <a href=""><i data-feather="user"></i>Perfil</a>
                </div>
                <div class="profile-grid-item">
                    <a href=""><i data-feather="user"></i>Perfil</a>
                </div>
                <div class="profile-grid-item">
                    <a href=""><i data-feather="user"></i>Perfil</a>
                </div>
                <div class="profile-grid-ads">
                    <img src="../../assets/logo-white.svg" alt="Imagem ">
                </div>
            </article>
            <?php if(!empty($data)){?>
            <article class="section-content">
                <h5 class="panel-title">Lista de pedidos</h5>
                <div class="filter">
                        <button class="primary small">Search</button>
                        <button class="secondary small">Apply</button>
                </div>
                <hr class="dividers"/>
                <div class="t-grid" style="--cols:6;">
                    <div class="t-grid-head">
                        <div class="t-row">
                            <span class="t-item">N Pedido</span>
                            <span class="t-item">Data</span>
                            <span class="t-item">Quatidade</span>
                            <span class="t-item">Valor</span>
                            <span class="t-item">Total</span>
                            <span class="t-item t-actions">Ações</span>
                        </div>
                    </div>
                    <div class="t-grid-body">
                        <?php foreach ($data as $key => $value){?>
                            <div class="t-row" id="<?= $value->id?>">
                                <span class="t-item"><?= $value->id?></span>
                                <span class="t-item"><?= $value->date?></span>
                                <span class="t-item"><?= $value->quant?></span>
                                <span class="t-item">R$ <?= $value->price?></span>
                                <span class="t-item">R$ <?= $value->tot?></span>
                                <span class="t-item t-actions">
                                    <button class="small" onclick="alert('<?= $value->id?>')"><i data-feather="eye"></i></button>
                                    <button class="small" onclick="alert('<?= $value->id?>')"><i data-feather="printer"></i></button>
                                </span>
                            </div>
                        <?php }?>
                    </div>
                    <div class="t-grid-foot"></div>
                </div>
            </article>
            <?php }?>
        </section>
    </main>
    <nav class="navigation-bottom">
        <span>
            <a href="../Home/index.html"><i class="icon-1" data-feather="home"></i></a>
        </span>
        <span>
            <a href="../Search/index.html"><i class="icon-1" data-feather="search"></i></a>
        </span>
        <span>
            <a href="../Favorites/index.html"><i class="icon-1" data-feather="heart"></i></a>
        </span>
        <span>
            <a href="../Cartshopping/index.html"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </span>
        <span>
            <a href="../Login/index.html"><i class="icon-1" data-feather="user"></i></a>
        </span>
    </nav>
<script src="./script.js" defer></script>
</body>
</html>