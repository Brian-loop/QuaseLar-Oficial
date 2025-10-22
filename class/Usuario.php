<?php
require_once './class/BancoDeDados_conexao.php';
// class Usuario {

//     private $conn;

//     public function __construct()
//     {
//         $dsn = "mysql:dbname=db_quaselar_oficial;host=127.0.0.1";
//         $usuario ='root';
//         $senha = '';
//         $this->conn = new PDO($dsn, $usuario, $senha);
//     }

//     public function cadastro($nome, $email, $telefone, $endereco, $cep,$cpf, $senha)
//     {
//         $script = "INSERT INTO tb_usuario (nome, email, telefone, endereco, cep, cpf, senha) VALUES (:nome,:email,:telefone, :endereco, :cep, :cpf, :senha)";
        
//         $insert = $this->conn ->prepare($script);

//         $insert->execute ([
//             ":nome" => $nome,
//             ":email" => $email,
//             ":telefone" => $telefone,
//             ":endereco" => $endereco,
//             ":cep" => $cep,
//             ":cpf" => $cpf,
//             ":senha" => $senha
//         ]);
        
//         return $this->conn->lastInsertId();

//     }

// }





// class Usuario{

//     public function cadastro($nome, $email, $telefone, $endereco, $cep, $cpf, $senha){

//         $db = new BancoDeDados_conexao();
//         $conn = $db->getConexao();

//         $script = "INSERT INTO tb_usuario (nome, email, telefone, endereco, cep, cpf, senha) 
//         VALUES (:nome,:email,:telefone, :endereco, :cep, :cpf, :senha)";

//         $insert = $this->$conn ->prepare($script);

//          $insert->execute ([
//             ":nome" => $nome,
//             ":email" => $email,
//             ":telefone" => $telefone,
//             ":endereco" => $endereco,
//             ":cep" => $cep,
//             ":cpf" => $cpf,
//             ":senha" => password_hash($senha, PASSWORD_DEFAULT)
//         ]);
        
//         return $this->$conn->lastInsertId();
//     }
// }




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
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':email', $dados['email']);
            $stmt->bindValue(':telefone', $dados['telefone']);
            $stmt->bindValue(':endereco', $dados['endereco']);
            $stmt->bindValue(':cep', $dados['cep']);
            $stmt->bindValue(':cpf', $dados['cpf']);
            $stmt->bindValue(':senha', password_hash($dados['senha'], PASSWORD_DEFAULT));

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function login($email, $senha) {
        try {
            $query = "SELECT * FROM tb_usuario WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

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
