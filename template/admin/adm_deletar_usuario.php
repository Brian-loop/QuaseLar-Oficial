<?php
require_once __DIR__ . '/../../class/Usuario.php';

    $usuario = new Usuario();

    if (isset($_GET['id_deletar'])) {
        $id = $_GET['id_deletar'];
    
        if ($usuario->DeletarUsuario($id)) {
            echo "<script>alert('Usuario deletado com sucesso!'); window.location.href='admin_index.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar o usuario.'); window.location.href='admin_index.php';</script>";
        }
   
    }
    ?>

