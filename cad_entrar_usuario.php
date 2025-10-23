<?php 
require_once './class/Usuario.php';

echo '<h1>cad_entrar_usuario.php</h1>';

function pegarCampoFormulario($campo_name) {
    if (isset($_POST[$campo_name]) && !empty($_POST[$campo_name])) {
        $valor = trim(htmlspecialchars($_POST[$campo_name]));
        return $valor;
    }
    return null;
}
if (isset($_POST['cadastrar'])) {
    // Utiliza a função para pegar os campos.
    $nome = pegarCampoFormulario('nome');
    $email = pegarCampoFormulario('email');
    $telefone = pegarCampoFormulario('telefone'); 
    $cpf = pegarCampoFormulario('cpf');
    $cep = pegarCampoFormulario('cep');
    $endereco = pegarCampoFormulario('endereco');
    $senha = pegarCampoFormulario('senha');
    $confirSenha = pegarCampoFormulario('confir_senha');
}


$dn = new Usuario();


























// $acao = $_POST['acao'] ?? '';

// $usuario = new Usuario();

// if ($acao === 'cadastrar') {
//     $dados = [
//         'nome' => $_POST['nome'] ?? '',
//         'email' => $_POST['email'] ?? '',
//         'telefone' => $_POST['telefone'] ?? '',
//         'endereco' => $_POST['endereco'] ?? '',
//         'cep' => $_POST['cep'] ?? '',
//         'cpf' => $_POST['cpf'] ?? '',
//         'senha' => $_POST['senha'] ?? '',
//     ];

//     if ($usuario->cadastrar($dados)) {
//         header( 'Location: tela_cad_entrar_usuarios.php?msg=cadastro_ok');
//         exit;
//     } else {
//         header('Location: tela_cad_entrar_usuarios.php?erro=cadastro');
//         exit;
//     }
// }

// if ($acao === 'entrar') {
//     $email = $_POST['email'] ?? '';
//     $senha = $_POST['senha'] ?? '';

//     if ($usuario->login($email, $senha)) {
//         header('Location: index.php');
//         exit;
//     } else {
//         header('Location: tela_cad_entrar_usuarios.php?erro=login');
//         exit;
//     }
// }





