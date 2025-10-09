<?php 
include './template/header.php';
?>
<section class="tela_cad_entrar">
    <main class="group_usuarios_inputs">
        <!-- sessão de login de usúario -->
        <nav class="entrar_usuario">
            <div class="titulo_cad_usuario"><h3>Login</h3></div>
            <div class="input-group">
                <input type="text" id="meuInput" required>
                <label for="meuInput">E-mail</label>
            </div>
             <div class="input-group">
                <input type="password" id="meuInput" required>
                <label for="meuInput">Senha</label>
            </div>
        </nav>
        <!-- formulario de cadastro -->
        <form action="cad_entrar_usuario.php" method="POST">
            <nav class="cad_usuario">
                <div class="titulo_cad_usuario"><h3>Cadastre-se</h3></div>

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
                        <input type="text" id="cpf" name="cpf" required maxlength="14" onblur="initCpfValidation()">
                        <label for="cpf" id="labelCpf">CPF</label>
                        <span id="msgErroCpf" class="mensagem-erro-cpf" role="alert" aria-live="polite">
                            <i class="bi bi-check-circle icone-ok"></i>
                            <i class="bi bi-x-circle icone-erro"></i>
                            <span id="textoErroCpf"></span>
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

                

                <div class="input-group">
                    <input type="text" id="meuInput" name="cep" required>
                    <label for="meuInput">CEP</label>
                </div>
                <div class="input-group">
                    <input type="password" id="meuInput" name="senha" required>
                    <label for="meuInput">Senha</label>
                </div>
                <div class="input-group">
                    <input type="password" id="meuInput" name="confirmar-senha" required>
                    <label for="meuInput">Confirmar senha</label>
                </div>
                <button class="button" type="submit">Enviar</button>
            </nav>
        </form>
    </main>
</section>


