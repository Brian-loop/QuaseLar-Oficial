<?php
require_once __DIR__ . '/../../class/Usuario.php';
require_once __DIR__ . '/../../class/BancoDeDados_conexao.php';

echo '<h1>adm_cad_usuario.php</h1>';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
 
            $nome = $_POST['nome'];
            $email =  $_POST['email'];
            $telefone = $_POST['endereco'];
            $cep = $_POST ['cep'];
            $cpf = $_POST ['cpf'];
            $senha = $_POST['senha'];
  

    
    $dadosUpdate = [
       'nome' => $nome,
       'email' => $email,
       'telefone' => $telefone,
       'cep' => $cep,
       'cpf' => $cpf,
       'senha' =>$senha

    ];

    $usuario = new Usuario();

    if ($usuario->EditarUsuario($dadosUpdate)) {
        echo "Informações do animal atualizadas!";
    } else {
        echo "Erro ao atualizar dados do animal.";
    }







}