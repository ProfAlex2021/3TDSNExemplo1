<?php

namespace Hardware;

include_once "../../conexao.php";

class Periferico
{
    protected int $cod;
    protected string $marca;
    protected string $modelo;
    protected string $cor;
    protected string $formato;
    protected bool $cabo;
    protected bool $wireless;

    public function create()
    {
        try {
            \Conexao::fabricarConexao()->abrir()->exec("INSERT INTO `periferico`(`marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless`) VALUES ('$this->marca', '$this->modelo', '$this->cor', '$this->formato', " . (int)$this->cabo . ", " . (int)$this->wireless . ")");
            $this->cod = \Conexao::fabricarConexao()->abrir()->lastInsertId();
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function read(int $cod)
    {
        try {
            $consulta = \Conexao::fabricarConexao()->abrir()->query("SELECT `cod`, `marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless` FROM `periferico` WHERE `cod` = $cod");
            return $consulta->fetchObject(__NAMESPACE__ . '\Periferico');
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public function update()
    {
        try {
            \Conexao::fabricarConexao()->abrir()->exec(
                "UPDATE `periferico` SET
                    `marca`='$this->marca',
                    `modelo`='$this->modelo',
                    `cor`='$this->cor',
                    `formato`='$this->formato',
                    `cabo`=$this->cabo,
                    `wireless`=$this->wireless
                WHERE
                    `cod` = $this->cod");
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function delete(int $cod)
    {
        try {
            \Conexao::fabricarConexao()->abrir()->exec("DELETE FROM `periferico` WHERE `cod` = $cod");
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function list()
    {
        try {
            $consulta = \Conexao::fabricarConexao()->abrir()->query("SELECT `cod`, `marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless` FROM `periferico`");
            return $consulta->fetchAll(\PDO::FETCH_CLASS, __NAMESPACE__ . '\Periferico');
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
