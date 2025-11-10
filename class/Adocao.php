
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

        $cmd = $this->conn->query(
      "
        SELECT 
            p.*, 
            (SELECT nome_arquivo 
             FROM tb_img_animal
             WHERE id_adocao = p.id_adocao 
             LIMIT 1) AS foto_capa,
            u.nome AS nome,
            u.telefone AS telefone,
            u.email AS email
        FROM tb_adocao p
        LEFT JOIN tb_usuario u ON p.id_usuario = u.id_usuario
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
    nome_pet = :nome_pet,
    sexo= :sexo,
    idade = :idade,
    semanas_meses_anos = :semanas_meses_anos,
    porte = :porte,
    raca = :raca,
    motivo_da_doacao = :motivo_da_doacao,
    especie= :especie,
    castrado = :castrado,
    vacinado = :vacinado
    WHERE id_adocao = :id_adocao";

        $script = $this->conn->prepare($update);
        $script->bindValue(':id_adocao', $dadosUpdate['id_adocao']);
        $script->bindValue(':nome_pet', $dadosUpdate['nome']);
        $script->bindValue(':sexo', $dadosUpdate['sexo']);
        $script->bindValue(':idade', $dadosUpdate['idade_pet']);
        $script->bindValue(':semanas_meses_anos', $dadosUpdate['idade']);
        $script->bindValue(':porte', $dadosUpdate['porte']);
        $script->bindValue(':raca', $dadosUpdate['raca']);
        $script->bindValue(':motivo_da_doacao', $dadosUpdate['motivo']);
        $script->bindValue(':especie', $dadosUpdate['especie']);
        $script->bindValue(':castrado', $dadosUpdate['castrado']);
        $script->bindValue(':vacinado', $dadosUpdate['vacinado']);


        // var_dump($_POST);
        return $script->execute();
    }
}
