<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $nomeBanco = "registros";
    public $conexao;

    public function conectar() {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->nomeBanco", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Conexão falhou: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->conexao = null;
    }

    public function executarQuery($sql) {
        return $this->conexao->query($sql);
    }

    public function prepararStatement($sql) {
        return $this->conexao->prepare($sql);
    }
    public function executarConsulta($sql) {
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erro na execução da consulta: " . $e->getMessage());
        }
    }
}
?>