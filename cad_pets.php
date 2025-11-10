<?php
include "./class/Adocao.php";
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo "<script>alert('Você precisa estar logado para cadastrar um animal!'); window.location.href='tela_cad_entrar_usuarios.php';</script>";
    exit;
}

$idUsuario = $_SESSION['usuario_id'];

$conexao = new BancoDeDados_conexao();
$resultado = $conexao->getConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 🔹 1️⃣ Cadastra o pet primeiro
    $nome = $_POST['nome'];
    $especie = $_POST['especie'];
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $porte = $_POST['porte'];
    $castrado = $_POST['castrado'];
    $idade_valor = $_POST['idade_pet'];
    $idade_tipo = $_POST['idade'];
    $vacinado = $_POST['vacinado'];
    $motivo_da_doacao = $_POST['motivo'];

    $adocao = new Adocao();


    $id_adocao = $adocao->cadastro(
        $idUsuario,
        $nome, 
        $especie, 
        $raca, 
        $sexo, 
        $porte, 
        $castrado, 
        $idade_valor, 
        $idade_tipo, 
        $motivo_da_doacao, 
        $vacinado
    );

    if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {
        $totalArquivos = count($_FILES['file']['name']);

        for ($i = 0; $i < $totalArquivos; $i++) {
            $nomeArquivo = $_FILES['file']['name'][$i];
            $arquivo_tmp = $_FILES['file']['tmp_name'][$i];
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            $novoNome = uniqid() . "." . $extensao;
            $caminho = "./uploads/" . $novoNome;

            if (move_uploaded_file($arquivo_tmp, $caminho)) {
            
                $sql = "INSERT INTO tb_img_animal (id_adocao, nome_arquivo, localizacao)
                        VALUES ('$id_adocao', '$novoNome', '$caminho')";
            
                if ($resultado->query($sql)) {
                    echo 'Foto cadastrada com sucesso!';
                } else {
                    echo 'Erro ao cadastrar no banco de dados.';
                }
            } else {
                echo 'Erro ao mover o arquivo para a pasta de upload.';
            }
        }

        echo "<script>alert('Animal cadastrado com sucesso!'); window.location.href='index.php';</script>";
        exit;

    } else {
        echo 'Erro no upload do arquivo.';
    }
}
