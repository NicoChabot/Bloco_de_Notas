<?php
$servername = "bloco_de_notas";
$username = "root";
$password = "";
$dbname = "bloco_de_notas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

