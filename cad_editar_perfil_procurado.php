<?php
include './class/Procurados.php';
require_once './class/BancoDeDados_conexao.php';

$conexao = new BancoDeDados_conexao();
$resultado = $conexao->getConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id_procurados"];
    $nome = $_POST["nome_procurado_editar"];
    $especie = $_POST["especie_procurado_editar"];
    $raca = $_POST["raca_procurado_editar"];
    $sexo = $_POST["sexo_procurado_editar"];
    $porte = $_POST["porte_procurado_editar"];
    $ultima_vez = $_POST["ultima_editar"];
    $idade_valor = $_POST["idade_valor_editar"];
    $idade_tipo = $_POST["idade_tipo_editar"];

    $procurados = new Procurados();

    $dadosUpdate = [
        'id_procurados' => $id,
        'nome_p' => $nome,
        'especie_p' => $especie,
        'raca_p' => $raca,
        'sexo_p' => $sexo,
        'porte_p' => $porte,
        'ultima_vez_visto' => $ultima_vez,
        'idade_p' => $idade_valor,
        'semanas_meses_anos_p' => $idade_tipo
    ];

    if ($procurados->EditarAnimalProcurado($dadosUpdate)) {
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
                $sql = "UPDATE tb_img_procurados 
                        SET nome_arquivo = :nome_arquivo, localizacao = :localizacao 
                        WHERE id_procurados = :id_procurados";
                $stmt = $resultado->prepare($sql);
                $stmt->bindValue(':id_procurados', $id);
                $stmt->bindValue(':nome_arquivo', $novoNome);
                $stmt->bindValue(':localizacao', $caminho);
                $stmt->execute();
            }
        }
    }

    header("Location: tela_exibicao_procurados.php");
    exit;
}
?>
