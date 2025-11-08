<?php
require_once __DIR__ . '/../class/BancoDeDados_conexao.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }
    public function cadastrar($dados)
    {
        try {
            $query = "INSERT INTO tb_usuario (nome, email, telefone, endereco, cep, cpf, senha, tipo_usuario)
                      VALUES (:nome, :email, :telefone, :endereco, :cep, :cpf, :senha, :tipo_usuario)";

            $resultado = $this->conn->prepare($query);

            $resultado->bindValue(':nome', $dados['nome']);
            $resultado->bindValue(':email', $dados['email']);
            $resultado->bindValue(':telefone', $dados['telefone']);
            $resultado->bindValue(':endereco', $dados['endereco']);
            $resultado->bindValue(':cep', $dados['cep']);
            $resultado->bindValue(':cpf', $dados['cpf']);
            $resultado->bindValue(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));

            // se não for enviado tipo_usuario, assume 'usuario'
            $tipo = isset($dados['tipo_usuario']) ? $dados['tipo_usuario'] : 'usuario';
            $resultado->bindValue(':tipo_usuario', $tipo);

            $resultado->execute();

            return true;
        } catch (PDOException $e) {
            error_log("Erro ao cadastrar usuário: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $senha)
    {
        try {
            $query = "SELECT * FROM tb_usuario WHERE email = :email";
            $resultado = $this->conn->prepare($query);
            $resultado->bindValue(':email', $email);
            $resultado->execute();
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['usuario_id'] = $usuario['id_usuario'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo_usuario'];
                $_SESSION['is_admin'] = ($usuario['tipo_usuario'] === 'admin');

                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erro no login: " . $e->getMessage());
            return false;
        }
    }

    public function ConsultaUsuario()
    {
        try {
            $script = 'SELECT * FROM tb_usuario';
            $resultado = $this->conn->query($script)->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            error_log("Erro ao consultar usuários: " . $e->getMessage());
            return [];
        }
    }


    public function ConsultaUsuarioById($idUsuario)
    {
        try {
            $script = "SELECT * FROM tb_usuario WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($script);
            $stmt->bindValue(':id_usuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao consultar usuário por ID: " . $e->getMessage());
            return null;
        }
    }
}
