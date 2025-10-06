<?php
include './class/Procurados.php';


$nome = $_POST ["nome_procurado"];
$especie = $_POST ["especie_procurado"];
$raca = $_POST["raca_procurado"];
$sexo = $_POST ["sexo_procurado"];
$porte = $_POST ["porte_procurado"];
$ultima_vez = $_POST ["ultima"];
$idade = $_POST ["idade_procurado"];


$procurados = new Procurados();
$resultado = $procurados->cadastro($nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade);


if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

    header("location:tela_cad_procurados.php");
}
else {

        echo'erro na conexao POST para fazer o cadastro';
}
