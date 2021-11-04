<?php
    include_once ('components/Notification/Notification.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Login</title>
    <link rel="stylesheet" href="app/View/Login/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
</head>
<body>
    <navigation-top style="width: 100%;">
        <a href="../Home/" slot="brand">
            <img src="assets/brand-white.svg" alt="Cartunings logo" height="40" aria-label="">
        </a>
        <input type="search" placeholder="Pesquise o seu kit ou peça" slot="search" class="w-100">
        <div slot="actions" class="actions flex gap-3 center">
            <a href="../Favorites" class="btn  ghost-white r-circle"><i class="icon-1" data-feather="heart"></i></a>
            <a href="../Cartshopping" class="btn  ghost-white r-circle"><i class="icon-1" data-feather="shopping-cart"></i></a>
        </div>
    </navigation-top>

    <main>
        <div class="wrapper-container">
            <form class="flex column gap-4">
                <header class="w-100 flex column gap-2">
                    <h4 class="heading">Para continuar precisamos de um e-mail.</h4>
                    <h6 class="w-100 sub-heading">Caso nao queira se cadastrar, você pode só informar o e-mail!</h6> 
                </header>
                <div class="body w-100">
                    <div class="input-group">
                        <label>E-mail</label>
                        <input type="email"  placeholder="Digite seu e-mail aqui." required class="w-100"/>
                    </div>
                </div>
                <footer class="w-100 flex justify-end">
                    <button class="primary">Continuar<i data-feather="arrow-right"></i></button>
                </footer>
            </form>
            <section class="flex row gap-5">
                <form class="flex column w-100 gap-4" action="../profile" method="POST">
                    <header class="w-100 flex column gap-2">
                        <h4 class="heading">Acessar a conta</h4>
                        <h6 class="w-100 sub-heading">Entre na conta para continuar a venda</h6> 
                    </header>
                    <?php $_SESSION['notification-login'] ? Notification::View("E-mail ou senha incorretos!","info") : '' ?>
                    <?php $_SESSION['notification-login-empty'] ? Notification::View("Preencha os campos para acessar!","info") : '' ?>
                    <div class="body w-100 flex column gap-3">
                        <div class="input-group w-100">
                            <label for="nome">E-mail</label>
                            <input type="text" required id="loginName" name="loginName" placeholder="Digite seu e-mail aqui." class="w-100"/>
                        </div>
                        <div class="input-group w-100">
                            <label for="nome" aria-label="Senha">Senha</label>
                            <input type="password" required id="loginPassword" name="loginPassword" placeholder="*********" class="w-100"/>
                        </div>
                    </div>
                    <footer class="w-100 flex justify-end gap-3">
                        <button class="ghost" name="open-modal-recover" type="button">Esqueci a senha</button>
                        <button class="primary" type="submit">Logar<i data-feather="log-in"></i></button>
                    </footer>
                </form>
                <form class="flex column w-100 gap-4" action="../register" method="POST">
                    <header class="w-100 flex column gap-2">
                        <h4 class="heading">Não tem Cadastro</h4>
                        <h6 class="w-100 sub-heading">Faça cadastro para continuar a venda.</h6> 
                    </header>
                    <?php $_SESSION['notification-register-err'] ? Notification::View("E-mail já cadastrados!","info") : '' ?>
                    <?php $_SESSION['notification-register-pass-err'] ? Notification::View("Senhas não são iguais!","info") : '' ?>
                    <?php $_SESSION['notification-register'] ? Notification::View("Usuário cadastrado!","info") : '' ?>
                    <div class="body w-100 flex column gap-3">
                        <div class="input-group w-100">
                            <label>Nome</label>
                            <input type="text" required id="name" name="name"  placeholder="João Oliveira" class="w-100"/>
                        </div>
                        <div class="input-group w-100">
                            <label>E-mail</label>
                            <input type="email" required id="email" name="email"  placeholder="joao@gmail.com" class="w-100"/>
                        </div>
                        <div class="input-group w-100">
                            <label>Senha</label>
                            <input type="password" required id="password" name="password"  placeholder="************" class="w-100"/>
                        </div>
                        <div class="input-group w-100">
                            <label>Confirme a senha</label>
                            <input type="password" required id="password1" name="password1"  placeholder="************" class="w-100"/>
                        </div>
                    </div>
                    <footer class="w-100 flex justify-end">
                        <button class="primary" type="submit">Cadastar<i data-feather="arrow-right"></i></button>
                    </footer>
                </form>
            </section>
        </div>
        </div>
        </div>
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
    <div class="modal">
        <div class="overlay"></div>
        <form class="flex column w-100 gap-4" action="../recover" method="POST">
            <header class="w-100 flex column gap-2">
                <h4 class="heading">Recuperar senha</h4>
                <h6 class="w-100 sub-heading">Será enviado um e-mail para recuperar sua senha.</h6> 
            </header>
            <div class="body w-100 flex column gap-3">
                <div class="input-group w-100">
                    <label>E-mail</label>
                    <input type="email" required id="emailRecover" name="emailRecover"  placeholder="joao@gmail.com" class="w-100"/>
                </div>
            </div>
            <footer class="w-100 flex justify-end">
                <button name="close-modal">Voltar</button>
                <button class="primary" type="submit">Enviar<i data-feather="arrow-right"></i></button>
            </footer>
        </form>
    </div>
<script src="app/View/Login/script.js" defer></script>
</body>
</html>

