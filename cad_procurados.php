<?php
include './class/Procurados.php';
include './class/Quaselar.php';

$conexao = new Quaselar();
$resultado = $conexao->conexao();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {

        $nomeArquivo = $_FILES['file']['name'];
        $arquivo_tmp = $_FILES['file']['tmp_name'];
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

    } else {
        echo 'Erro no upload do arquivo.';
    }
}


$nome = $_POST ["nome_procurado"];
$especie = $_POST ["especie_procurado"];
$raca = $_POST["raca_procurado"];
$sexo = $_POST ["sexo_procurado"];
$porte = $_POST ["porte_procurado"];
$ultima_vez = $_POST ["ultima"];
$idade_valor = $_POST ["idade_valor"];
$idade_tipo =$_POST["idade_tipo"];


$procurados = new Procurados();
$resultado = $procurados->cadastro($nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade_valor, $idade_tipo);


if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

    header("location:tela_cad_procurados.php");
}
else {
    
    echo'erro na conexao POST para fazer o cadastro';
}

    