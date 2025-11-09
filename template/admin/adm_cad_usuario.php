<?php
require_once __DIR__ . '/../../class/Usuario.php';
require_once __DIR__ . '/../../class/BancoDeDados_conexao.php';

echo '<h1>adm_cad_usuario.php</h1>';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['endereco'],
            'cep' => $_POST ['cep'],
            'cpf' => $_POST ['cpf'],
            'senha' => $_POST['senha']
    ];

    $usuario = new Usuario();

    if($usuario->cadastrar($dados)){
           echo "<script>alert('Usuario Cadastrado com sucesso!')</script>";
        header('Location: admin_index.php');
    } else {
        echo "Erro ao cadastrar usuário!";
    }
    

}