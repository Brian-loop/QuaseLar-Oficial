<?php 
$_ENV = parse_ini_file(__DIR__ . '/../.env');  //torna o arquivo ".env" em global
// $_ENV = parse_ini_file(".env");
class BancoDeDados_conexao{
    private $conn;

    public function __construct(){
        try{
            // Conexao feita em conjunto com o arquivo .env   ============================
            $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']};charset=utf8";
            $usuario = $_ENV['USUARIO'];
            $senha = $_ENV['SENHA'];
            //===========================================================================
            $this->conn = new PDO($dsn, $usuario, $senha);
            
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function getConexao(){
        return $this->conn;
    }
}
