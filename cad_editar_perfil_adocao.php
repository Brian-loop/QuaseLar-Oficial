<?php
include './class/Adocao.php';
require_once './class/BancoDeDados_conexao.php';

$conexao = new BancoDeDados_conexao();
$resultado = $conexao->getConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_adocao = $_POST['id_adocao'];
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

    
    $dadosUpdate = [
        'id_adocao' => $id_adocao,   
        'nome' => $nome,
        'sexo' => $sexo,
        'idade_pet' => $idade_valor,
        'idade' => $idade_tipo,
        'porte' => $porte,
        'raca' => $raca,
        'motivo' => $motivo_da_doacao,
        'especie' => $especie,
        'castrado' => $castrado,
        'vacinado' => $vacinado
    ];
    
    $adocao = new Adocao();
    
    if ($adocao->EditarAnimaladocao($dadosUpdate)) {
        echo "Informações do animal atualizadas!";
    } else {
        echo "Erro ao atualizar dados do animal.";
    }


    if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {

        $totalArquivos = count($_FILES['file']['name']);

        for ($i = 0; $i < $totalArquivos; $i++) {
            $nomeArquivo = $_FILES['file']['name'][$i];
            $arquivo_tmp = $_FILES['file']['tmp_name'][$i];
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
            $novoNome = uniqid() . "." . $extensao;
            $caminho = "./uploads/" . $novoNome;

            if (move_uploaded_file($arquivo_tmp, $caminho)) {
                $sql = "UPDATE tb_img_animal
                        SET nome_arquivo = :nome_arquivo, localizacao = :localizacao 
                        WHERE id_adocao = :id_adocao";
                $stmt = $resultado->prepare($sql);
                $stmt->bindValue(':id_adocao', $id_adocao);
                $stmt->bindValue(':nome_arquivo', $novoNome);
                $stmt->bindValue(':localizacao', $caminho);
                $stmt->execute();
            }
        }
    }

    header("Location: tela_perfil.php");
    exit;
}
?>
