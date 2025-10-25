<?php
include "./class/Adocao.php";
include './class/BancoDeDados_conexao.php';



$conexao = new BancoDeDados_conexao();
$resultado = $conexao->getConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {

        $totalArquivos = count($_FILES['file']['name']);

        for ($i = 0; $i < $totalArquivos; $i++) {
            $nomeArquivo = $_FILES['file']['name'][$i];
            $arquivo_tmp = $_FILES['file']['tmp_name'][$i];
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            $novoNome = uniqid() . "." . $extensao;
            $caminho = "./uploads/" . $novoNome;

            if (move_uploaded_file($arquivo_tmp, $caminho)) {


                $sql = "INSERT INTO img_animal (nome_arquivo, localizacao) VALUES ('$novoNome', '$caminho')";

                if ($resultado->query($sql)) {
                    echo 'Foto cadastrada com sucesso!';
                } else {
                    echo 'Erro ao cadastrar no banco de dados.';
                }
            } else {
                echo 'Erro ao mover o arquivo para a pasta de upload.';
            }
        }
    } else {
        echo 'Erro no upload do arquivo.';
    }
}

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


$adoacao = new Adocao();
$resultado = $adoacao->cadastro($nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado);

if ($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro'])) {

    header("location:tela_cad_pets.php");
} else {

    echo 'erro na conexao POST para fazer o cadastro';
}
