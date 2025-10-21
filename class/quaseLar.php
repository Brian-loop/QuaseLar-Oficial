<?php

class Quaselar {

  private $conn;

  public function __construct()
  {
      $dsn = "mysql:dbname=db_quaselar_oficial;host=127.0.0.1";
      $usuario = 'root';
      $senha = '';
      $this->conn = new PDO($dsn, $usuario, $senha);
  }

  public function conexao()
  {
      return $this->conn;
  }
}
