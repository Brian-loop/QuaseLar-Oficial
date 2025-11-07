
<?php
require_once __DIR__ . '/../class/BancoDeDados_conexao.php';

class Adocao
{


    private $conn;

    public function __construct()
    {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }

    public function cadastro($nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado)
    {
        $script = "INSERT INTO tb_adocao (nome_pet, raca, sexo, porte, castrado, idade, semanas_meses_anos, motivo_da_doacao, especie, vacinado) VALUES (:nome_pet, :raca, :sexo, :porte, :castrado, :idade, :semanas_meses_anos, :motivo_da_doacao, :especie, :vacinado)";
        $insert = $this->conn->prepare($script);

        $insert->execute([
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

    public function consultarAnimaisAdocao()
    {

        $cmd = $this->conn->query("
      SELECT *,
       (SELECT nome_arquivo 
        FROM tb_img_animal
        WHERE id_adocao = tb_adocao.id_adocao
        LIMIT 1) AS foto_capa_adocao
       FROM tb_adocao
");

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function consultarAnimaisAdocaoById($id)
    {

        $cmd = $this->conn->prepare("SELECT * FROM tb_adocao WHERE id_adocao = :id_adocao");
        $cmd->bindValue(':id_adocao', $id);
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function consultarImgAnimaisAdocaoById($id)
    {
        $cmd = $this->conn->prepare("SELECT * FROM tb_img_animal WHERE id_adocao = :id_adocao");
        $cmd->bindValue(':id_adocao', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function DeletarAnimaisAdocao($id)
    {
        $delete = 'DELETE FROM tb_adocao WHERE id_adocao = :id_adocao';
        $script = $this->conn->prepare($delete);
        $script->bindValue('id_adocao', $id);
        return $script->execute();
    }

    public function EditarAnimaladocao($dadosUpdate)
    {
        $update = "UPDATE tb_adocao SET
    nome = :nome_p,
    sexo= :sexo_p,
    idade = :idade_p,
    semanas_meses_anos = :semanas_meses_anos_p,
    porte = :porte_p,
    raca = :raca_p,
    motivo_da_doacao = :motivo_da_doacao,
    especie= :especie
    WHERE id_procurados = :id_procurados";

        $script = $this->conn->prepare($update);
        $script->bindValue(':id_procurados', $dadosUpdate['id_procurados']);
        $script->bindValue(':nome_p', $dadosUpdate['nome_p']);
        $script->bindValue(':sexo_p', $dadosUpdate['sexo_p']);
        $script->bindValue(':idade_p', $dadosUpdate['idade_p']);
        $script->bindValue(':semanas_meses_anos_p', $dadosUpdate['semanas_meses_anos_p']);
        $script->bindValue(':porte_p', $dadosUpdate['porte_p']);
        $script->bindValue(':raca_p', $dadosUpdate['raca_p']);
        $script->bindValue(':ultima_vez_visto', $dadosUpdate['ultima_vez_visto']);
        $script->bindValue(':especie_p', $dadosUpdate['especie_p']);


        var_dump($_POST);
        return $script->execute();
    }
}
