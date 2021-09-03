<?php
namespace Hardware;

use JsonSerializable;

include_once "../../periferico/Periferico.php";
include_once "../../conexao.php";

class Mouse extends Periferico implements JsonSerializable{
    private int $periferico;
    private int $botoes;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

    public function __construct(int $botoes, string $marca, string $modelo, string $cor, string $formato, bool $cabo = true, bool $wireless = false, int $cod = 0)
    {
        $this->botoes = $botoes;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->formato = $formato;
        $this->cabo = $cabo;
        $this->wireless = $wireless;
        $this->periferico = $this->cod = $cod;
    }
    
    public function Click(string $botao){
        echo "Click com o botão $botao";
    }

    public static function StaticClick(string $botao){
        echo "Click estático com o botão $botao";
    }

    public function jsonSerialize(){
        return [
            "botoes" => $this->botoes,
            "marca" => $this->marca,
            "modelo" => $this->modelo,
            "cor" => $this->cor,
            "formato" => $this->formato,
            "cabo" => $this->cabo,
            "wireless" => $this->wireless,
        ];
    }

    public function create(){
        try {
            parent::create();
            $this->periferico = $this->cod;
            \Conexao::fabricarConexao()->abrir()->exec("INSERT INTO `mouse`(`periferico`, `botoes`) VALUES ($this->periferico, $this->botoes)");
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function read(int $cod){
        try {
            $consulta = \Conexao::fabricarConexao()->abrir()->query("SELECT `botoes`, `marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless`, `periferico` FROM `mouse` INNER JOIN `periferico` ON `mouse`.`periferico` = `periferico`.`cod` WHERE `cod` = $cod");
            echo json_encode($consulta->fetch(\PDO::FETCH_ASSOC), JSON_NUMERIC_CHECK);
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public function update(){
        try {
            parent::update();
            $this->periferico = $this->cod;
            \Conexao::fabricarConexao()->abrir()->exec("UPDATE `mouse` SET `botoes`=$this->botoes WHERE `periferico` = $this->periferico");
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }

    }

    public static function delete(int $cod){
        try {
            \Conexao::fabricarConexao()->abrir()->exec("DELETE FROM `mouse` WHERE `periferico` = $cod");
            parent::delete($cod);
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function list(){
        try {
            $consulta = \Conexao::fabricarConexao()->abrir()->query("SELECT `botoes`, `marca`, `modelo`, `cor`, `formato`, `cabo`, `wireless`, `periferico` FROM `mouse` INNER JOIN `periferico` ON `mouse`.`periferico` = `periferico`.`cod`");
            $lista = $consulta->fetchAll(\PDO::FETCH_ASSOC);
            echo json_encode($lista, JSON_NUMERIC_CHECK); 
        } catch (\Exception $e) {
            die("Erro: " . $e->getMessage());
        }
    }

    public static function fromArray(array $dados): Mouse{
        return new Mouse($dados['botoes'], $dados['marca'], $dados['modelo'], $dados['cor'], $dados['formato'], $dados['cabo'], $dados['wireless'], isset($dados['cod'])?$dados['cod']:0);
    }
    public static function fromJson(string $dados): Mouse{
        $dados = json_decode($dados);
        $mouse = new Mouse($dados->botoes, $dados->marca, $dados->modelo, $dados->cor, $dados->formato, $dados->cabo, $dados->wireless, $dados->cod);
        return $mouse;
    }
}