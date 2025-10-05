<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuaseLar</title>
    <!-- conexão para o css -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/tela_cad_pets.css">
    <link rel="stylesheet" href="./css/tela_cad_entrar_usuarios.css">
    <link rel="stylesheet" href="./css/tela_cad_procurados.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- bootstrap js-->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- arquivos JS -->
    <script defer src="./js/script.js"></script>
    <script defer src=""></script>
    <script defer src=""></script>
    
</head>
<body class="body">
    <header class="header_html">
        <nav class="group_itens">
            <div class="itens1">
            <a href="./index.php" class="logo"><img src="./img/Cat-logo.png">QuaseLar</a>
            </div>
            <div class="itens2">
                <a href="" class="entrar">Entrar</a>
                <a href="./tela_cad_entrar_usuarios.php" class="cadastrar">Cadastrar-se</a>
            </div>
        </nav>
        <button id="hamburger" class="hamburger" aria-label="Abrir Menu">
            <span class="barra1"></span>
            <span class="barra2"></span>
            <span class="barra3"></span>
        </button>
        <nav class="tela_burguer" id="tela_menu">
            <ul class="itens_menu">
                <li class="entrar-menu"><a href="" class="entrar-menu"><i class="bi bi-box-arrow-in-right"></i>Entrar</a></li>
                <li class="cadastrar-menu"><a href="" class="cadastrar-menu"><i class="bi bi-person-add"></i>Casdastrar-se</a></li>
                <li><a href="#" onclick="exibirModal()"><i class="bi bi-person-raised-hand"></i>Quem somos?</a></li>
                <li><a href="tela_cad_procurados.php"><i class="bi bi-search-heart"></i>Procura-se</a></li>
                <li><a href="tela_cad_pets.php"><i class="bi bi-box2-heart"></i>Colocar para adoção</a></li>
                <li><a href=""><i class="bi bi-gear-fill"></i>Configurações</a></li>
            </ul>
        </nav>
    </header> 
    <!-- tela "Quem somos?"  -->
    <div id="meuModal" class="modal">
        <div class="modal-conteudo">
            <span class="fechar">&times;</span>
            <div class="conteudo-modal-1">
                <img src="./img/sobre_nos.png" alt="">
            </div>
            <div class="conteudo-modal-2">
                <h2>Bem-vindo ao <br>QuaseLar</h2>
                <p>Somos um portal dedicado à adoção e à busca responsável de animais. Aqui, você pode encontrar pets para adoção, divulgar animais
                    perdidos ou procurar por um novo companheiro.
                    O que oferecemos:
                    Anúncios de adoção: cães, gatos e outros pets esperando por um lar
                    Anúncios de animais perdidos ou procurados
                    Nosso objetivo é conectar quem quer adotar com quem precisa doar.
                    Juntos, podemos mudar vidas — uma adoção por vez.
                </p>
            </div>
        </div>
    </div>