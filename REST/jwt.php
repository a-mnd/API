<?php
require 'vendor/autoload.php';
include_once "conexao.php";
include_once "config.php";

use Firebase\JWT\JWT;

//$chaveSecreta = "";
$idUser = 123;
$nome = "Jhon Doe";

$corpo = [
    'iss' => "http://localhost/aulaAPI/REST/jwt.php", //Quem emeitiu o token 
    'iat' => time(), // data de emissão 
    'exp' => time() + 3600, // expira em 1 hora
    'data' => [
        'id' => $idUser,
        'nome' => $nome 
    ]
];
$API_KEY = JWT::encode($corpo, CHAVE_SECRETA, 'HS256');
 echo $API_KEY;