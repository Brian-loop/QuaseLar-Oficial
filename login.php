<?php
require_once './class/BancoDeDados_conexao.php';
require_once './class/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    if($email === '') {
        echo "O campo de email é obrigatório!";
        exit;
    }
    
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    if ($usuario->login($email, $senha)) {
        echo "Login bem-sucedido!";
        // redireciona para o painel do usuário
        // header('Location: painel.php');
        exit;
    } else {
        echo "Email ou senha incorretos!";
    }
}
