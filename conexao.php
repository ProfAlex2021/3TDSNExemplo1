<?php

class Conexao
{
    private string $host = "localhost";
    private string $usuario = "root";
    private string $senha = "";
    private string $banco = "3tdsn";
    private ?PDO $conexao = null;
    private static ?Conexao $fabrica = null;

    public static function fabricarConexao(): Conexao
    {
        try {
            if (!self::$fabrica)
                self::$fabrica = new Conexao();
            return self::$fabrica;
        } catch (PDOException $e) {
            echo "Falha de conexão: " . $e->getMessage();
        }
    }

    public function abrir(): PDO
    {
        try {
            if (!$this->conexao) {
                $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->usuario, $this->senha);
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->conexao;
        } catch (PDOException $e) {
            echo "Falha de conexão: " . $e->getMessage();
        }
    }
}
