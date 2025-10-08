
<?php

class Procurados {


    private $conn;

    public function __construct()
    {
        $dsn = "mysql:dbname=db_quaselar;host=127.0.0.1";
        $usuario ='root';
        $senha = '';
        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastro( $nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade_valor, $idade_tipo)
    {
        $script = "INSERT INTO tb_procurados ( nome_p, especie_p, raca_p, sexo_p, porte_p, ultima_vez_visto, idade_valor, idade_tipo) VALUES ( :nome_p, :especie_p, :raca_p, :sexo_p, :porte_p, :ultima_vez_visto, :idade_valor,:idade_tipo)";

        $insert = $this->conn ->prepare($script);

        $insert->execute ([
            
            ":nome_p" => $nome,
            ":especie_p" => $especie,
            ":raca_p" => $raca,
            ":sexo_p" => $sexo,
            ":porte_p" => $porte,
            ":ultima_vez_visto" => $ultima_vez,
            ":idade_valor" => $idade_valor,
            ":idade_tipo" => $idade_tipo
        ]);
        
        return $this->conn->lastInsertId();
    }

    




}