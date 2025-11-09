<?php
require_once __DIR__ . '/../../class/Procurados.php';


 $procurados = new Procurados();

    if (isset($_GET['id_deletar'])) {
        $id = $_GET['id_deletar'];
    
       if ($procurados->DeletarAnimalProcurado($id)) {
            echo "<script>alert('Animal deletado com sucesso!'); window.location.href='admin_index.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar o Animal.'); window.location.href='admin_index.php';</script>";
        }
    }
    ?>
