<?php 
// require_once './class/BancoDeDados_conexao.php';
// include './class/Usuario.php';



// if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

//     header("location:tela_cad_entrar_usuarios.php");
// }
// else {

//         echo'erro na conexao POST para fazer o cadastro';
// }


// $nome = $_POST["nome"];
// $email = $_POST["email"];
// $telefone = $_POST["telefone"];
// $endereco = $_POST["endereco"];
// $cep = $_POST ["cep"];
// $cpf = $_POST ["cpf"];
// $senha = $_POST ["senha"];
// $confirmar = $_POST ["confirmar-senha"];


// if ($senha != $confirmar){
//     echo 'senhas não compativeis';
//     header('location:tela_cad_entrar_usuarios.php');
// }


// $usuario = new Usuario();
// $resultado = $usuario->cadastro($nome, $email, $telefone, $endereco, $cep,$cpf, $senha);


// if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

//     header("location:tela_cad_entrar_usuarios.php");
// }
// else {

//         echo'erro na conexao POST para fazer o cadastro';
// }



//=================================================================================
require_once './class/Usuario.php';

$acao = $_POST['acao'] ?? '';

$usuario = new Usuario();

if ($acao === 'cadastrar') {
    $dados = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? '',
        'endereco' => $_POST['endereco'] ?? '',
        'cep' => $_POST['cep'] ?? '',
        'cpf' => $_POST['cpf'] ?? '',
        'senha' => $_POST['senha'] ?? '',
    ];

    if ($usuario->cadastrar($dados)) {
        header('Location: tela_cad_entrar_usuarios.php?msg=cadastro_ok');
        exit;
    } else {
        header('Location: tela_cad_entrar_usuarios.php?erro=cadastro');
        exit;
    }
}

if ($acao === 'entrar') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario->login($email, $senha)) {
        header('Location: index.php');
        exit;
    } else {
        header('Location: tela_cad_entrar_usuarios.php?erro=login');
        exit;
    }
}
