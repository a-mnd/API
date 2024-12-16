<?php
$url = "http://localhost/aulaAPI/REST/server.php";
$data = [
    'id' => 22 // no delete não precisa dos dados só do id
];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);
$resposta = curl_exec($ch);
curl_close($ch);

$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);