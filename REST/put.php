<?php
$url = "http://localhost/aulaAPI/REST/server.php";
$data = [
    'id' => 23,
    'nome' => 'Lilia',
    'email' => 'email@email.com'
];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));//CURLOPT_POSTFIELDS significa pegar os dados
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);//[] significa array
$resposta = curl_exec($ch);
curl_close($ch); //esta fechando a sessão

$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);
