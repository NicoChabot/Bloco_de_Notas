<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM notas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Nota excluída com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
