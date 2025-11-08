<?php 
require_once './class/BancoDeDados_conexao.php';
require_once './class/Usuario.php';

echo '<h1>cad_entrar_usuario.php</h1>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'endereco' => $_POST['endereco'],
        'cep' => $_POST['cep'],
        'cpf' => $_POST['cpf'],
        'senha' => $_POST['senha']
    ];

    $usuario = new Usuario();

    if ($usuario->cadastrar($dados)) {
        echo "<script>alert('Usuario Cadastrado com sucesso! faça login agora')</script>";
        header('Location: tela_cad_entrar_usuarios.php');
    } else {
        echo "Erro ao cadastrar usuário!";
    }
} 
        