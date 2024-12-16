<?php
$host = "localhost";
$db = "banco";
$user = "root";
$senha = "";

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $senha);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}
