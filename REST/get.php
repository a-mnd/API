<?php
include_once "config.php";
$ch = curl_init(URLS);

// $ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2F1bGFBUEkvUkVTVC9qd3QucGhwIiwiaWF0IjoxNzMxNjI4MjMzLCJleHAiOjE3MzE2MzE4MzMsImRhdGEiOnsiaWQiOjEyMywibm9tZSI6Ikpob24gRG9lIn19.NKhDaIrkKsCM-KtTxsIBK6bANDAj52coIWbqS-TgLl8',
    'Content-Type: application/json'
]);
$resposta = curl_exec($ch);
$dados = json_decode($resposta, true);

echo "<pre>";
print_r($dados);

curl_close($ch);
