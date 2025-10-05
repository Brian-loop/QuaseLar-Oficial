
<?php

class Procurados {


    private $conn;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];
        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastro($id, $nome, $especie, $raca, $sexo, $porte, $ultima_vez)
    {
        $script = "INSERT INTO tb_procurados (id_usuario, nome_p, especie_p, raca_p, sexo_p, porte_p, ultima_vez_visto) VALUES (:id_usuario, :nome_p, :especie_p, :raca_p, :sexo_p, :porte_p, :ultima_vez_visto)";

        $insert = $this->conn ->prepare($script);

        $insert->execute ([
            ":id_usuario" => $id,
            ":nome_p" => $nome,
            ":especie_p" => $especie,
            ":raca_p" => $raca,
            ":sexo_p" => $sexo,
            ":porte_p" => $porte,
            ":ultima_vez_visto" => $ultima_vez
        ]);
        
        return $this->conn->lastInsertId();
    }

    




}