
<?php

class Procurados {


    private $conn;

    public function __construct()
    {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }

    public function cadastro( $nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade_valor, $idade_tipo)
    {
        $script = "INSERT INTO tb_procurados (nome_p, especie_p, raca_p, sexo_p, porte_p, ultima_vez_visto, idade_p,semanas_meses_anos_p) VALUES ( :nome_p, :especie_p, :raca_p, :sexo_p, :porte_p, :ultima_vez_visto, :idade_p,:semanas_meses_anos_p)";

        $insert = $this->conn ->prepare($script);

        $insert->execute ([

            ":nome_p" => $nome,
            ":especie_p" => $especie,
            ":raca_p" => $raca,
            ":sexo_p" => $sexo,
            ":porte_p" => $porte,
            ":ultima_vez_visto" => $ultima_vez,
            ":idade_p" => $idade_valor,
            ":semanas_meses_anos_p" => $idade_tipo,
       
        ]);
        
        return $this->conn->lastInsertId();
    }

    




}