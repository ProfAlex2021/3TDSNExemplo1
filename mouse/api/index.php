<?php
header('Content-type: application/json; charset="utf-8"');
$config = ['http' => ['GET', 'POST', 'PUT', 'DELETE']];
$metodo = $_SERVER['REQUEST_METHOD'];

include_once "../../conexao.php";
include_once "../Mouse.php";
switch ($metodo) {
    case $config['http'][0]: //GET = listar ou ler apenas um (cod)
        if (!isset($_GET['cod']))
            Hardware\Mouse::list();
        else
            Hardware\Mouse::read($_GET['cod']);
        break;
    case $config['http'][1]: //POST = cadastrar
        Hardware\Mouse::fromArray($_POST)->create();
        break;
    case $config['http'][2]: //PUT = editar / atualizar dados
        parse_str(file_get_contents('php://input'), $dados);
        var_dump($dados);
        Hardware\Mouse::fromArray($dados)->update();
        break;
    case $config['http'][3]: //DELETE = deletar / excluir
        //$dados = file_get_contents('php://input');
        //var_dump($_GET['cod']);
        Hardware\Mouse::delete((int)$_GET['cod']);
        break;

    default:
        die(json_encode(['erro' => "Método de acesso inválido"]));
        break;
}
