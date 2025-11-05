
<?php
require_once __DIR__ . '/../class/BancoDeDados_conexao.php';

class Procurados
{


    private $conn;

    public function __construct()
    {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }

    public function cadastro($nome, $especie, $raca, $sexo, $porte, $ultima_vez, $idade_valor, $idade_tipo, $id_usuario)
    {
        $script = "INSERT INTO tb_procurados (nome_p, especie_p, raca_p, sexo_p, porte_p, ultima_vez_visto, idade_p,semanas_meses_anos_p, id_usuario) VALUES ( :nome_p, :especie_p, :raca_p, :sexo_p, :porte_p, :ultima_vez_visto, :idade_p,:semanas_meses_anos_p,:id_usuario)";

        $insert = $this->conn->prepare($script);

        $insert->execute([

            ":nome_p" => $nome,
            ":especie_p" => $especie,
            ":raca_p" => $raca,
            ":sexo_p" => $sexo,
            ":porte_p" => $porte,
            ":ultima_vez_visto" => $ultima_vez,
            ":idade_p" => $idade_valor,
            ":semanas_meses_anos_p" => $idade_tipo,
            ":id_usuario" => $id_usuario

        ]);

        return $this->conn->lastInsertId();
    }
    public function consultarAnimais()
    {

        $cmd = $this->conn->query(
      "
        SELECT 
            p.*, 
            (SELECT nome_arquivo 
             FROM tb_img_procurados 
             WHERE id_procurados = p.id_procurados 
             LIMIT 1) AS foto_capa,
            u.nome AS nome,
            u.telefone AS telefone,
            u.email AS email
        FROM tb_procurados p
        LEFT JOIN tb_usuario u ON p.id_usuario = u.id_usuario
    ");

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function consultarAnimaisById($id)
    {


        $cmd = $this->conn->prepare("SELECT * FROM tb_procurados WHERE id_procurados = :id_procurados");
        $cmd->bindValue(':id_procurados', $id);
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }
        return $dados;
    }

    public function consultarImgAnimais()
    {

        $script = 'SELECT * FROM tb_img_procurados';

        $resultado = $this->conn->query($script)->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }

    public function consultarImgAnimaisById($id)
    {
        $cmd = $this->conn->prepare("SELECT * FROM tb_img_procurados WHERE id_procurados = :id_procurados");
        $cmd->bindValue(':id_procurados', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

    public function EditarAnimalProcurado($dadosUpdate)
    {
        $update = "UPDATE tb_procurados SET
            nome_p = :nome_p,
            sexo_p = :sexo_p,
            idade_p = :idade_p,
            semanas_meses_anos_p = :semanas_meses_anos_p,
            porte_p = :porte_p,
            raca_p = :raca_p,
            ultima_vez_visto = :ultima_vez_visto,
            especie_p = :especie_p
            WHERE id_procurados = :id_procurados";

        $stmt = $this->conn->prepare($update);
        $stmt->bindValue(':id_procurados', $dadosUpdate['id_procurados']);
        $stmt->bindValue(':nome_p', $dadosUpdate['nome_p']);
        $stmt->bindValue(':sexo_p', $dadosUpdate['sexo_p']);
        $stmt->bindValue(':idade_p', $dadosUpdate['idade_p']);
        $stmt->bindValue(':semanas_meses_anos_p', $dadosUpdate['semanas_meses_anos_p']);
        $stmt->bindValue(':porte_p', $dadosUpdate['porte_p']);
        $stmt->bindValue(':raca_p', $dadosUpdate['raca_p']);
        $stmt->bindValue(':ultima_vez_visto', $dadosUpdate['ultima_vez_visto']);
        $stmt->bindValue(':especie_p', $dadosUpdate['especie_p']);


        var_dump($_POST);
        return $stmt->execute();
    }

    public function DeletarAnimalProcurado($id)
    {
        $delete = 'DELETE FROM tb_procurados WHERE id_procurados = :id_procurados';
        $stmt = $this->conn->prepare($delete);
        $stmt->bindValue(':id_procurados', $id, PDO::PARAM_INT);
        return $stmt->execute();

        return $resultado;
    }
}
