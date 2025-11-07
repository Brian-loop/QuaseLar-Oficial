<?php
    include './class/Adocao.php';

    $adocao = new Adocao();

    if (isset($_GET['id_deletar'])) {
        $id = $_GET['id_deletar'];
    
        if ($adocao->DeletarAnimaisAdocao($id)) {
            echo "<script>alert('Animal deletado com sucesso!'); window.location.href='tela_perfil.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar o animal.'); window.location.href='tela_perfil.php';</script>";
        }
   
    }
    ?>


