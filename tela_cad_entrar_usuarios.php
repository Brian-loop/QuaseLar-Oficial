<?php 
include './template/header.php';
?>
<section class="tela_cad_entrar">
    <main class="group_usuarios_inputs">
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
        <form action="cad_entrar_usuario.php" method="POST">
            <nav class="cad_usuario">
                <div class="titulo_cad_usuario"><h3>Cadastre-se</h3></div>

                <input type="hidden" name="cadastro" value="1">

                <div class="input-group">
                    <input type="text" id="nome" name="nome"  required onblur="validaNome()">
                    <label for="nome" id="labelNome">Digite seu nome...</label>
                    <span id="msgErroNome"></span>
                </div>
                <div class="input-group">
                    <input type="text" id="meuInput" name="email" required>
                    <label for="meuInput">E-mail</label>
                </div>
                <div class="juntos">
                    <div class="input-group">
                        <input type="text" id="meuInput" name="telefone" required title="Formato: (XX) XXXX-XXXX ou (XX) XXXXX-XXXX">
                        <label for="meuInput">Telefone</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="meuInput" name="cpf" required>
                        <label for="meuInput">CPF</label>
                    </div>
                </div>
                
                <div class="input-group">
                    <input type="text" id="meuInput" name="endereco" required>
                    <label for="meuInput">Endereço</label>
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


