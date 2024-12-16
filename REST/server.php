<?php
error_reporting(E_ALL); //use apenas em modo desenvolvimneto
ini_set('display_errors', 1); //use apenas em modo desenvolvimneto
header('Content-Type: application/json'); //para mostrar o padrao para arquivo json

$metodo = $_SERVER['REQUEST_METHOD'];
include_once "conexao.php";

switch ($metodo) {
    case 'GET':
        //echo json_encode(["O métodos requisitado é GET."]);
        try { //executa

            $select = $con->prepare("SELECT * FROM usuario");
            $select->execute();
            $dados = $select->fetchAll(PDO::FETCH_ASSOC); // fetchAll pega todos id
            echo json_encode($dados);

        } catch (Exception $e) {
            // o catch traz a mensagem de erro e para
            echo json_encode(['erro' => $e->getMessage()]);
        }
        break;

        //-------------------------------------------------------------------------
    case 'POST':
        //echo json_encode(["O métodos requisitado é POST."]);

        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['nome']) && isset($input['email'])) {
            $novo = [
                'nome' => $input['nome'],
                'email' => $input['email']
            ];

            $insert = $con->prepare('INSERT INTO usuario (nome, email) VALUES (:nome, :email)');
            if ($insert->execute($novo)) {
                echo json_encode(['mensagem' => "Cadastrado com sucesso!"]);
            } else {
                echo json_encode(['mensagem' => "Erro: Não foi possível cadastrar"]);
            }
        }
        break;

        //-------------------------------------------------------------------------
    case 'PUT':
        //echo json_encode(["O métodos requisitado é PUT."]);

        $input = json_decode(file_get_contents('php://input'), true);
        // print_r($input);
        $atualiza = [
            'id' => $input['id'],
            'nome' => $input['nome'],
            'email' => $input['email']
        ];
        $update = $con->prepare("UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :id");
        if ($update->execute($atualiza)) {
            echo json_encode(['mensagem' => "Atualizado com sucesso!"]);
        } else {
            echo json_encode(['mensagem' => "Erro ao atualizar!"]);
        }
        break;

        //-------------------------------------------------------------------------
    case 'DELETE':
        // echo json_encode(["O métodos requisitado é DELETE."]);

        $input = json_decode(file_get_contents('php://input'), true);
        $id = $input['id'];
        $delete = $con->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        if ($delete->execute([$id])) {
            echo json_encode(['mensagem' => "Deletado com sucesso!"]);
        } else {
            echo json_encode(['mensagem' => "Erro ao deletar"]);
        }
        break;
    default:
        http_response_code(405);
        echo json_encode(['mensagem' => 'Método inválido!']);
        break;
}
