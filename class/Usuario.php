<?php
require_once './class/BancoDeDados_conexao.php';

class Usuario {
    private $conn;
    public function __construct() {
        $db = new BancoDeDados_conexao();
        $this->conn = $db->getConexao();
    }

    public function cadastrar($dados) {
        try {
            $query = "INSERT INTO tb_usuario (nome, email, telefone, endereco, cep, cpf, senha)
                      VALUES (:nome, :email, :telefone, :endereco, :cep, :cpf, :senha)";
            $resultado = $this->conn->prepare($query);

            $resultado->bindValue(':nome', $dados['nome']);
            $resultado->bindValue(':email', $dados['email']);
            $resultado->bindValue(':telefone', $dados['telefone']);
            $resultado->bindValue(':endereco', $dados['endereco']);
            $resultado->bindValue(':cep', $dados['cep']);
            $resultado->bindValue(':cpf', $dados['cpf']);
            $resultado->bindValue(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));

            $resultado->execute();

            return true;
        } catch (PDOException $e) {     // $e serve para capturar o erro
            return false;
        }
    }
    

    public function login($email, $senha) {
        try {
            $query = "SELECT * FROM tb_usuario WHERE email = :email";
            $resultado = $this->conn->prepare($query);
            $resultado->bindValue(':email', $email);
            $resultado->execute();
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];

                
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
