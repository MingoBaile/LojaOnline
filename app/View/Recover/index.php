<?php
    include_once ('components/Notification/Notification.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartunings | Recover</title>
    <link rel="stylesheet" href="app/View/Recover/style.css">
    <script src="../scripts/index.js" defer></script>
    <script src="../components/Navigation/index.js" defer></script>
</head>
<body>
    <navigation-top style="width: 100%;">
        <a href="../Home/" slot="brand">
            <img src="assets/brand-white.svg" alt="Cartunings logo" height="40" aria-label="">
        </a>
    </navigation-top>

    <main>
        <div class="wrapper-container">
            <form class="flex column gap-4">
                <header class="w-100 flex column gap-2">
                    <h4 class="heading">Recuperação de senha</h4>
                    <h6 class="w-100 sub-heading">Cadastre uma senha nova!</h6>
                </header>
                <div class="body w-100">
                    <div class="input-group">
                        <label for="newPassword">Senha</label>
                        <input type="password" name="newPassword" id="newPassword" placeholder="*******" required class="w-100"/>
                    </div>
                    <div class="input-group">
                        <label for="newPasswordConfirm">Confirmar senha</label>
                        <input type="password" name="newPasswordConfirm" id="newPasswordConfirm" placeholder="*******" required class="w-100"/>
                    </div>
                    <div class="input-group flex row gap-2 align-center">
                        <input type="checkbox" id="showPass"/>
                        <label for="showPass">Exibir senhas</label>
                    </div>
                </div>
                <footer class="w-100 flex justify-end">
                    <button class="primary">Continuar<i data-feather="arrow-right"></i></button>
                </footer>
            </form>
        </div>
        </div>
        </div>
    </main>
    <nav class="navigation-bottom">
        <span>
            <a href="../Home"><i class="icon-1" data-feather="home"></i></a>
        </span>
    </nav>
<script src="app/View/Recover/script.js" defer></script>
</body>
</html>

