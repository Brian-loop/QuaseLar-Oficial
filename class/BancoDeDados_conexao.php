<?php 
$_ENV = parse_ini_file(".env");
class BancoDeDados_conexao{
    private $conn;

    public function __construct(){
        try{
            //Conexao feita em conjunto com o arquivo .env   ============================
            $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']};charset=utf8";
            $usuario = $_ENV['USUARIO'];
            $senha = $_ENV['SENHA'];
            //===========================================================================

            // $dsn = "mysql:dbname=db_quaselar_oficial;host=localhost;charset=utf8";
            // $usuario = 'root';
            // $senha = '';

            $this->conn = new PDO($dsn, $usuario, $senha);
            
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }

    public function getConexao(){
        return $this->conn;
    }
}
