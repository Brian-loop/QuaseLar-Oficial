<?php 
session_start();
include 'conexao.php';

if (isset($_GET['acao']) && $_GET['acao'] === 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

?>