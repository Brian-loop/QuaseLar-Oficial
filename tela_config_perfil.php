<?php
include './template/header.php';

//tela de perfil
//tais hhhhhh
?>
<section class="config_tela">
    <form action="">
    <main class="container_confg">

            <div class="imagem-configuracoes"></div>
            <div class="config_menu">
                <a href="">Informações do Usuario</a>
                <a href="">Privacidade e Segurança</a>
            </div>
            <nav class="itens_confg1">
                <h3> <strong>Atualizar Informações</strong></h3>
                <label for=""><strong>Nome</strong></label>
                <input type="text">
                <label for=""><strong>Telefone</strong></label>
                <input type="text">
                <label for=""><strong>Email</strong></label>
                <input type="text">
                <div class="botoes_config">
                     <button type="button" class="btn btn-secondary" >Limpar Tudo</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </nav>
            <nav class="itens_confg2">
                    <h3><strong>Atualizar Informações</strong></h3>
                    <label for="">Senha</label>
                    <input type="text">
                    <label for="">Confirmar senha</label>
                    <input type="text">
                    <div class="botoes_config2">
                        <button  type="button" class="btn btn-danger" >excluir conta</button>
                        <button type="button" class="btn btn-secondary" >Limpar tudo</button>
                        <button  type="button" class="btn btn-primary">Salvar</button>
                    </div>
            </nav>
        </main>
    </form>
</section>