
<?php

class Adocao {


    private $conn;

    public function __construct()
    {
        $dsn = "mysql:dbname=db_quaselar_oficial;host=127.0.0.1";
        $usuario ='root';
        $senha = '';
        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastro( $nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado)
    {
        $script = "INSERT INTO tb_adocao (nome_pet, raca, sexo, porte, castrado, idade_valor, idade_tipo, motivo_da_adocao, especie, vacinado) VALUES (:nome_pet, :raca, :sexo, :porte, :castrado, :idade_valor, :idade_tipo, :motivo_da_adocao, :especie, :vacinado)"; 
        $insert = $this->conn ->prepare($script);

        $insert->execute ([
            ":nome_pet" => $nome,
            ":raca" => $raca,
            ":sexo" => $sexo,
            ":porte" => $porte,
            ":castrado" => $castrado,
            ":idade_valor" => $idade_valor,
            ":idade_tipo" => $idade_tipo,    
            ":motivo_da_adocao" => $motivo_da_doacao,
            ":especie" => $especie,
            ":vacinado" => $vacinado

        ]);
        
        return $this->conn->lastInsertId();
    }


}