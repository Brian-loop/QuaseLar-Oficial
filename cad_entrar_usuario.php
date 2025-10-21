<?php 
require_once './class/BancoDeDados_conexao.php';
include './class/Usuario.php';


$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$endereco = $_POST["endereco"];
$cep = $_POST ["cep"];
$cpf = $_POST ["cpf"];
$senha = $_POST ["senha"];
$confirmar = $_POST ["confirmar-senha"];


if ($senha != $confirmar){
    echo 'senhas não compativeis';
    header('location:tela_cad_entrar_usuarios.php');
}


$usuario = new Usuario();
$resultado = $usuario->cadastro($nome, $email, $telefone, $endereco, $cep,$cpf, $senha);


if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

    header("location:tela_cad_entrar_usuarios.php");
}
else {

        echo'erro na conexao POST para fazer o cadastro';
}



