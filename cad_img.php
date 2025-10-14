<?php 


$conexao = new Quaselar();
$resultado = $conexao->conexao();


if ($resultado->$connect_error){
    die("Falha na conexão do banco" . $resultado->$connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_FILES["file"]) && $_FILES["file"] ["error"] == 0){

        $nomeArquivo = $_FILES['file'] ['name'];
        $arquivo_tmp = $_FILES ['file'] ['tmp_name'];

        $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);

        $novoNome = uniqid() . "." . $extensao;

        $caminho = "./uploads" . $novoNome;

        if(move_uploaded_file($arquivo_tmp, $caminho)){

            $sql = "INSERT INTO img_animal (nome_arquivo, localizacao) VALUES ('$novo_nome', '$caminho_upload')";
        }
        
        if ($resultado->query($sql) == TRUE) {

            echo'foto cadastrada';
        }

        else{
            echo'erro ao cadastrar';
        }

    }






}