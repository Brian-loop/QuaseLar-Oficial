<?php
    include './class/Procurados.php';

    $procurados = new Procurados();

    if (isset($_GET['id_deletar'])) {
        $id = $_GET['id_deletar'];
    
        if ($procurados->DeletarAnimalProcurado($id)) {
            echo "<script>alert('Animal deletado com sucesso!'); window.location.href='tela_perfil.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar o animal.'); window.location.href='tela_perfil.php';</script>";
        }
    } else {
        echo "<script>alert('ID não informado.'); window.location.href='tela_perfil.php';</script>";
    }
    
    ?>


