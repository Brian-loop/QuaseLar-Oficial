<?php
include './class/Procurados.php';


$conexao = new BancoDeDados_conexao();
$resultado = $conexao->getConexao();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $nome = $_POST["nome_procurado"];
    $especie = $_POST["especie_procurado"];
    $raca = $_POST["raca_procurado"];
    $sexo = $_POST["sexo_procurado"];
    $porte = $_POST["porte_procurado"];
    $ultima_vez = $_POST["ultima"];
    $idade_valor = $_POST["idade_valor"];
    $idade_tipo = $_POST["idade_tipo"];

    $procurados = new Procurados();

  
    $id_procurado = $procurados->cadastro($nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade_valor, $idade_tipo,$id_usuario);

   
    if (isset($_FILES["file"]) && $_FILES["file"]["error"][0] == 0) {

        $totalArquivos = count($_FILES['file']['name']);

        for ($i = 0; $i < $totalArquivos; $i++) {

            $nomeArquivo = $_FILES['file']['name'][$i];
            $arquivo_tmp = $_FILES['file']['tmp_name'][$i];
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            $novoNome = uniqid() . "." . $extensao;
            $caminho = "./uploads/" . $novoNome;

            if (move_uploaded_file($arquivo_tmp, $caminho)) {

              
                $sql = "INSERT INTO tb_img_procurados (id_procurados, nome_arquivo, localizacao) 
                        VALUES ($id_procurado, '$novoNome', '$caminho')";

                if ($resultado->query($sql)) {
                    echo 'Foto cadastrada com sucesso!';
                } else {
                    echo 'Erro ao cadastrar no banco de dados.';
                }

            } else {
                echo 'Erro ao mover o arquivo para a pasta de upload.';
            }
        }

        echo "<script>alert('Animal Cadastrado com sucesso!'); window.location.href='tela_exibicao_procurados.php';</script>";
        exit;

    } else {
        echo 'Erro no upload do arquivo.';
    }

}
?>
