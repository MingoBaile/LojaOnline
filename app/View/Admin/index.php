<?php 
    $listUser = Admin::getUserAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Admin </title>
    <link rel="stylesheet" href="../app/View/Admin/style.css">
    <script src="../scripts/index.js" async></script>
    <script src="../components/Navigation/index.js" async></script>
</head>
<body>
    <navigation-top >
        <a href="#home" slot="brand">
            <img src="../assets/brand-white.svg" alt="Cartunings logo"  height="40"/>
        </a>
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../logout" class="btn p-3  ghost-white r-circle"><i class="icon-1" data-feather="log-out"></i></a>
        </div>
    </navigation-top>
    <main>
        <aside class="aside-profile">
            <div class="card-perfil">
                <img src="../assets/img-products/car-opala-principal.jpg" alt="Imagem ">
                <label>Admin</label>
            </div>
            <div class="nav-link">
                <ul class="nav-upper">
                    <li>
                        <a href="#"><i data-feather="users"></i>Usuários</a>
                    </li>
                    <li>
                        <a href="#"><i data-feather="package"></i>Produtos</a>
                    </li>
                    <li>
                        <a href="#"><i data-feather="settings"></i>Configurações</a>
                    </li>
                </ul>
                <ul class="nav-below">
                    <li>
                        <a href="/logout"><i data-feather="log-out"></i>Sair</a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <section class="profile-content">
            <?php if(!empty($listUser)){?>
            <article class="section-content">
                <h5 class="panel-title">Lista de Usuários</h5>
                <div class="filter">
                        <button class="primary small">Search</button>
                        <button class="secondary small">Apply</button>
                </div>
                <hr class="dividers"/>
                <div class="t-grid" style="--cols:4;">
                    <div class="t-grid-head">
                        <div class="t-row">
                            <span class="t-item">Nome</span>
                            <span class="t-item">Email</span>
                            <span class="t-item">Password</span>
                            <span class="t-item t-actions">Ações</span>
                        </div>
                    </div>
                    <div class="t-grid-body">
                        <?php foreach ($listUser as $key => $user){?>
                            <div class="t-row" id="<?= $user->getEmail()?>">
                                <span class="t-item"><?= $user->getName() ?></span>
                                <span class="t-item"><?= $user->getEmail()?></span>
                                <span class="t-item" data-tooltip="<?= $user->getPassword()?>"><?= $user->getPassword()?></span>
                                <span class="t-item t-actions">
                                    <!-- <button class="small" onclick="alert('<?= $user->getEmail() ?>')"><i data-feather="key"></i></button> -->
                                    <button class="small" id="<?= $user->getEmail()?>" data-open="modal-edit"><i data-feather="edit"></i></button>
                                    <button class="small" onclick="alert('<?= $user->getEmail() ?>')"><i data-feather="trash"></i></button>
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
    <div class="modal" id="modal-edit">
        <div class="overlay"></div>
        <form class="flex column w-100 gap-4" action="../recover" method="POST">
            <header class="w-100 flex column gap-2">
                <h4 class="heading">Editar usuário</h4>
                <h6 class="w-100 sub-heading">Você pode editar os dados do usuário!</h6>
            </header>
            <div class="body w-100 flex column gap-3">
                <div class="input-group w-100">
                    <label>Nome</label>
                    <input type="text" required id="name" name="name" placeholder="joao@gmail.com" class="w-100"/>
                </div>
                <div class="input-group w-100">
                    <label>E-mail</label>
                    <input type="email" id="email" disabled name="email" placeholder="joao@gmail.com" class="w-100"/>
                </div>
            </div>
            <footer class="w-100 flex justify-end">
                <button data-close="modal-editl">Voltar</button>
                <button class="primary" type="submit">Salvar<i data-feather="save"></i></button>
            </footer>
        </form>
    </div>

    <script src="../app/View/Admin/script.js" async></script>
</body>
</html>