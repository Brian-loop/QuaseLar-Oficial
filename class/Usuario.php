<?php

class Usuario {

    private $conn;

    public function __construct()
    {
        $dsn = "mysql:dbname=db_quaselar_oficial;host=127.0.0.1";
        $usuario ='root';
        $senha = '';
        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastro($nome, $email, $telefone, $endereco, $cep,$cpf, $senha)
    {
        $script = "INSERT INTO tb_usuario (nome, email, telefone, endereco, cep, cpf, senha) VALUES (:nome,:email,:telefone, :endereco, :cep, :cpf, :senha)";
        
        $insert = $this->conn ->prepare($script);

        $insert->execute ([
            ":nome" => $nome,
            ":email" => $email,
            ":telefone" => $telefone,
            ":endereco" => $endereco,
            ":cep" => $cep,
            ":cpf" => $cpf,
            ":senha" => $senha
        ]);
        
        return $this->conn->lastInsertId();

    }







}
