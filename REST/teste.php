<?php
include_once "conexao.php";
 $novo = [
    'nome' => 'nome',
    'email' => 'email'
];
$insert = $con->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
if($insert->execute($novo)) {
    echo json_encode(['mensagem' => "Cadastrado com sucesso!"]);
} else {
    echo json_encode(['mensagem'=> "Erro: Não foi possível cadastrar"]);
}