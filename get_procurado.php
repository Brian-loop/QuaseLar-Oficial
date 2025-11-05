<?php
require './class/Procurados.php';

$procurados = new Procurados();

$id = $_GET['id'] ?? null;
if (!$id) {
    echo json_encode(['sucesso' => false, 'erro' => 'ID inválido']);
    exit;
}

$dados = $procurados->consultarAnimaisById($id);
$imagens = $procurados->consultarImgAnimaisById($id);

if ($dados) {
    echo json_encode([
        'sucesso' => true,
        'procurado' => $dados,
        'imagens' => $imagens
    ]);
} else {
    echo json_encode(['sucesso' => false]);
}
