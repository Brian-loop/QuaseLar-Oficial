<?php
include "./class/Adocao.php";

$nome = $_POST['nome']; 
$especie = $_POST ['especie'];
$raca = $_POST ['raca'];
$sexo = $_POST ['sexo'];
$porte = $_POST ['porte'];
$castrado = $_POST ['castrado'];
$idade_valor = $_POST ['idade_pet'];
$idade_tipo= $_POST['idade'];
$vacinado = $_POST ['vacinado'];
$motivo_da_doacao = $_POST ['motivo'];


$adoacao = new Adocao();
$resultado = $adoacao->cadastro($nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado);

if($_SERVER['REQUEST_METHOD'] = 'POST' && isset($_POST['cadastro']) ){

    header("location:tela_cad_pets.php");
}
else {

        echo'erro na conexao POST para fazer o cadastro';
}
 