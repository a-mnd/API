<?php
require 'vendor/autoload.php'; //padrão ele pega as pasta
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json'); //para mostrar o padrao para arquivo json
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

include_once "conexao.php";
include_once "config.php";

$cabecalho = getallheaders();
if (isset($cabecalho['Authorization'])) {
    $chave = str_replace('Bearer ', '', $cabecalho['Authorization']);
    $assinatura = new Key(CHAVE_SECRETA, 'HS256');
    $usuario = JWT::decode($chave, $assinatura);
    if ($usuario) {
        //echo json_encode(['mensagem' => "Acesso autorizado", 'dados' => $usuario]);
        try { //executa

            $select = $con->prepare("SELECT * FROM usuario");
            $select->execute();
            $dados = $select->fetchAll(PDO::FETCH_ASSOC); // fetchAll pega todos id
            echo json_encode($dados);
        } catch (Exception $e) {
            // o catch traz a mensagem de erro e para
            echo json_encode(['erro' => $e->getMessage()]);
        }
    } else {
        http_response_code(401);
        echo json_encode(['mensagem' => "Token inválido"]);
    }
} else {
    http_response_code(401);
    echo json_encode(['mensagem' => "Cabeçalho de autorização ausente."]);
}
