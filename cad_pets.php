<?php
include "./class/Adocao.php";



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
    $adocao->cadastro(
        $nome, $especie, $raca, $sexo, $porte, 
        $castrado, $idade_valor, $idade_tipo, 
        $motivo_da_doacao, $vacinado
    );

    // 🔹 2️⃣ Recupera o ID do último registro inserido
  // 1️⃣ Cadastra o pet e pega o ID do cadastro
$adocao = new Adocao();
$idAdocao = $adocao->cadastro(
    $nome, $especie, $raca, $sexo, $porte, 
    $castrado, $idade_valor, $idade_tipo, 
    $motivo_da_doacao, $vacinado
);

// 2️⃣ Faz o upload das imagens
if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {
    $totalArquivos = count($_FILES['file']['name']);

    for ($i = 0; $i < $totalArquivos; $i++) {
        $nomeArquivo = $_FILES['file']['name'][$i];
        $arquivo_tmp = $_FILES['file']['tmp_name'][$i];
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        $novoNome = uniqid() . "." . $extensao;
        $caminho = "./uploads/" . $novoNome;

        if (move_uploaded_file($arquivo_tmp, $caminho)) {
            // Associa imagem ao id_adocao recém-cadastrado
            $sql = "INSERT INTO tb_img_animal (id_adocao, nome_arquivo, localizacao)
                    VALUES (:id_adocao, :nome_arquivo, :localizacao)";
            $stmt = $adocao->$this->conn->prepare($sql);
            $stmt->execute([
                ':id_adocao' => $idAdocao,
                ':nome_arquivo' => $novoNome,
                ':localizacao' => $caminho
            ]);
        } else {
            echo 'Erro ao mover o arquivo para a pasta de upload.';
        }
    }
}
}