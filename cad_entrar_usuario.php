<?php 
require_once './class/BancoDeDados_conexao.php';
require_once './class/Usuario.php';
// require_once __DIR__ . './js/validacoes.js';

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
        echo "<script>alert('Usuario Cadastrado com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "Erro ao cadastrar usuário!";
    }
} 
        











































//metodo basico de cadastro de usuario so com os campos nome e email

// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     die('Acesso inválido.');
// }

// $nome = $_POST['nome'];
// $email = $_POST['email'];

// //chamando a classe de conexão com o banco de dados
// $banco = new BancoDeDados_conexao();    
// //pegando a conexão com o banco de dados
// $conn = $banco->getConexao();          

// $script = $conn->prepare("INSERT INTO tb_usuario (nome, email) VALUES ('$nome','$email')");

// $resultado = $script->execute();


// if($resultado == true){
//     echo "Usuário cadastrado com sucesso!";
// } else{
//     echo "Erro ao cadastrar usuário: " . mysqli_error($this->conn); 


        
// }
