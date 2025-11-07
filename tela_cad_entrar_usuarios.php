<?php
include './template/header.php';

?>

<section class="tela_cad_entrar">
    <main class="group_usuarios_inputs">
        <form class="entrar_usuario" action="login.php" method="POST">
            <!-- sessão de login de usúario -->
            <div class="titulo_cad_usuario">
                <h3>Login</h3>
            </div>
            <div class="input-group">
                <input type="email" name="email" required>
                <label for="email">E-mail</label>
            </div>
            <div class="input-group">
                <input type="password" name="senha" required>
                <label for="senha">Senha</label>
            </div>
            <!-- <button type="submit" class="btn-cadastrar">Entrar</button> -->
            <button type="submit" id="btn_login" name="login">Entrar</button>
        </form>
        <!-- tela divisoria -->
         
        <!-- <div class="tela-movel" id="telaMovel"><span id="texto"></span></div> -->

        <!-- formulario de cadastro -->
        <form action="cad_entrar_usuario.php" method="POST" class="cad_usuario">
            <div class="titulo_cad_usuario">
                <h3>Cadastre-se</h3>
            </div>

            <input type="hidden" name="cadastro" value="1">

            <!-- nome -->
            <div class="input-group">
                <input type="text" id="nome" name="nome" required onblur="validaNome()" oninput="validaNome()" aria-describedby="msgErroNome">
                <label for="nome" id="labelNome">Digite seu nome...</label>
                <span id="msgErroNome" class="mensagem-erro" role="alert" aria-live="polite">
                    <i class="bi bi-check-circle icone-ok"></i>
                    <i class="bi bi-x-circle icone-erro"></i>
                    <span id="textoErro"></span>
                </span>
            </div>
            <!-- email -->
            <div class="input-group">
                <input type="text" id="email" name="email" required onblur="validaEmail()" oninput="validaEmail()" aria-describedby="msgErroEmail">
                <label for="email" id="labelEmail">E-mail</label>
                <span id="msgErroEmail" class="mensagem-erro" role="alert" aria-live="polite">
                    <i class="bi bi-check-circle icone-ok"></i>
                    <i class="bi bi-x-circle icone-erro"></i>
                    <span id="textoErroEmail"></span>
                </span>
            </div>

            <!-- telefone e CPF -->
            <div class="juntos">
                <div class="input-group">
                    <input type="text" id="telefone" name="telefone" oninput="validaTelefone()" onblur="validaTelefone()" required maxlength="14">
                    <label for="telefone" id="labelTelefone">Telefone</label>
                    <span id="msgErroTelefone" class="mensagem-erro" role="alert" aria-live="polite">
                        <i class="bi bi-check-circle icone-ok"></i>
                        <i class="bi bi-x-circle icone-erro"></i>
                        <span id="textoErroTelefone"></span>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" id="cpf" name="cpf" required maxlength="14" oninput="validaCpf()" onblur="validaCpf()">
                    <label for="cpf" id="labelCpf">CPF</label>
                    <span id="msgErroCpf" class="mensagem-erro-cpf" role="alert" aria-live="polite">
                        <i class="bi bi-check-circle icone-ok"></i>
                        <i class="bi bi-x-circle icone-erro"></i>
                        <span id="textoErroCpf"></span>
                    </span>
                </div>
            </div>

            <!-- CEP e Numero-->
            <div class="juntos2">
                <div class="input-group">
                    <input type="text" class="cep_input" id="cep" name="cep" required aria-describedby="msgErroCep" maxlength="9" oninput="validarCep()" onblur="validarCep(); buscarEnderecoPorCep();">
                    <label for="cep" id="labelCep">CEP</label>
                    <span id="msgErroCep" class="mensagem-erro" role="alert" aria-live="polite">
                        <i class="bi bi-check-circle icone-ok"></i>
                        <i class="bi bi-x-circle icone-erro"></i>
                        <span id="textoErroCep"></span>
                    </span>
                </div>
                <div class="input-group">
                    <input type="number" class="num_input" id="numero" name="numero" required maxlength="4" pattern="[0-9]{4}" onblur="validaNumero()" oninput="validaNumero()">
                    <label for="numero" id="labelNumero">Número</label>
                    <span id="msgErroNumero" class="mensagem-erro-numero" role="alert" aria-live="polite">
                        <i class="bi bi-check-circle icone-ok"></i>
                        <i class="bi bi-x-circle icone-erro"></i>
                        <span id="textoErroNumero"></span>
                    </span>
                </div>
            </div>

            <!-- Endereço -->
            <div class="input-group">
                <input type="text" id="endereco" name="endereco" required onblur="validaEndereco()" oninput="validaEndereco()" aria-describedby="msgErroEndereco" maxlength="160">
                <label for="endereco" id="labelEndereco">Endereço</label>
                <span id="msgErroEndereco" class="mensagem-erro" role="alert" aria-live="polite">
                    <i class="bi bi-check-circle icone-ok"></i>
                    <i class="bi bi-x-circle icone-erro"></i>
                    <span id="textoErroEndereco"></span>
                </span>
            </div>

            <!-- Senha -->
            <div class="input-group">
                <input type="password" id="senha" name="senha" required maxlength="160" oninput="validaSenha()" onblur="validaSenha()" aria-describedby="msgErroSenha">
                <label for="senha" id="labelSenha">Senha</label>
                <span id="msgErroSenha" class="mensagem-erro" role="alert" aria-live="polite">
                    <i class="bi bi-check-circle icone-ok"></i>
                    <i class="bi bi-x-circle icone-erro"></i>
                    <span id="textoErroSenha"></span>
                </span>
            </div>

            <!-- Confirmar senha -->
            <div class="input-group">
                <input type="password" id="confir_senha" name="confir_senha" required maxlength="160" oninput="confirmarSenha()" onblur="confirmarSenha()" aria-describedby="msgErroConfirSenha">
                <label for="confir_senha" id="labelConfirSenha">Confirmar senha</label>
                <span id="msgErroConfirSenha" class="mensagem-erro" role="alert" aria-live="polite">
                    <i class="bi bi-check-circle icone-ok"></i>
                    <i class="bi bi-x-circle icone-erro"></i>
                    <span id="textoErroConfir_senha"></span>
                </span>
            </div>
            <div id="modal-temporario" class="modal">
                <div class="modal-conteudo" id="modal-conteudo"></div>
            </div>

            <button type="submit" class="btn-cadastrar" id="btn_cadastrar" name="cadastrar">Cadastrar</button>

        </form>
    </main>
</section>
<script>
    function iniciarMovimentoTela() {
    const tela = document.getElementById("telaMovel");
    const direita = document.getElementById("direita");
    const esquerda = document.getElementById("esquerda");

    let texto = document.getElementById("text");
    texto.innerText = "Entrar";
    
    let estaNaDireita = false;

    function moverTela2() {
        if (estaNaDireita) {
            tela.style.transform = "translateX(0)";
            tela.style.width = "20rem";
            texto.innerText = "Entrar";


        } else {
            tela.style.transform = "translateX(20rem)";
            tela.style.width = "26rem";
            texto.innerText = "Cadastrar-se";

        }
        estaNaDireita = !estaNaDireita; // inverte o estado
    }

    direita.addEventListener("click", () => {
        tela.style.transform = "translateX(20rem)";
        tela.style.width = "26rem";
        estaNaDireita = true;
        texto.innerText = "Cadastrar-se";

    });
    
    esquerda.addEventListener("click", () => {
        tela.style.transform = "translateX(0)";
        tela.style.width = "20rem";
        estaNaDireita = false;
        texto.innerText = "Entrar";
    });

    tela.addEventListener("click", moverTela2);
}

document.addEventListener("DOMContentLoaded", iniciarMovimentoTela);

</script>