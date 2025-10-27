
<?php

class Adocao {


    private $conn;

    public function __construct()
    {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }

    public function cadastro( $nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado)
    {
        $script = "INSERT INTO tb_adocao (nome_pet, raca, sexo, porte, castrado, idade, semanas_meses_anos, motivo_da_doacao, especie, vacinado) VALUES (:nome_pet, :raca, :sexo, :porte, :castrado, :idade, :semanas_meses_anos, :motivo_da_doacao, :especie, :vacinado)"; 
        $insert = $this->conn ->prepare($script);

        $insert->execute ([
            ":nome_pet" => $nome,
            ":raca" => $raca,
            ":sexo" => $sexo,
            ":porte" => $porte,
            ":castrado" => $castrado,
            ":idade" => $idade_valor,
            ":semanas_meses_anos" => $idade_tipo,    
            ":motivo_da_doacao" => $motivo_da_doacao,
            ":especie" => $especie,
            ":vacinado" => $vacinado

        ]);
        
        return $this->conn->lastInsertId();
    }


}