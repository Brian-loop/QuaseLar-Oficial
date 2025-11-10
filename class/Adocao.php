
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

    public function cadastro($idUsuario, $nome, $especie, $raca, $sexo, $porte, $castrado, $idade_valor, $idade_tipo, $motivo_da_doacao, $vacinado)
{
    $cmd = $this->conn->prepare("
        INSERT INTO tb_adocao (
            id_usuario,
            nome_pet,
            especie,
            raca,
            sexo,
            porte,
            castrado,
            idade,
            semanas_meses_anos,
            motivo_da_doacao,
            vacinado,
            data_criacao_cad_pet,
            status_cad_pet
        ) VALUES (
            :id_usuario,
            :nome_pet,
            :especie,
            :raca,
            :sexo,
            :porte,
            :castrado,
            :idade,
            :semanas_meses_anos,
            :motivo_da_doacao,
            :vacinado,
            NOW(),
            'ativo'
        )
    ");

    $cmd->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
    $cmd->bindParam(':nome_pet', $nome);
    $cmd->bindParam(':especie', $especie);
    $cmd->bindParam(':raca', $raca);
    $cmd->bindParam(':sexo', $sexo);
    $cmd->bindParam(':porte', $porte);
    $cmd->bindParam(':castrado', $castrado);
    $cmd->bindParam(':idade', $idade_valor);
    $cmd->bindParam(':semanas_meses_anos', $idade_tipo);
    $cmd->bindParam(':motivo_da_doacao', $motivo_da_doacao);
    $cmd->bindParam(':vacinado', $vacinado);

    $cmd->execute();

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
    "
        );

        if ($cmd->rowCount() > 0) {
            $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $dados = array();
        }
        return $dados;
    }

   public function consultarAnimaisAdocaoByUsuario($idUsuario)
{
    $cmd = $this->conn->prepare("
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
        WHERE p.id_usuario = :id_usuario
    ");

    $cmd->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
    $cmd->execute();

    if ($cmd->rowCount() > 0) {
        return $cmd->fetchAll(PDO::FETCH_ASSOC); 
    } else {
        return []; 
    }
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
