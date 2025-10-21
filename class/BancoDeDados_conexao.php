<?php 
class BancoDeDados_conexao{
    private $conn;

    public function __construct(){
        try{
            $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']};charset=utf8";
            $usuario = $_ENV['USUARIO'];
            $senha = $_ENV['SENHA'];

            $this->conn = new PDO($dsn, $usuario, $senha);
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function getConexao(){
        return $this->conn;
    }
}
