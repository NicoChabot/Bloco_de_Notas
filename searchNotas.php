<?php
include 'config.php';

$pesquisa = $_GET['pesquisa'] ?? '';

$sql = "SELECT id, titulo, conteudo, data_criacao FROM notas WHERE titulo LIKE '%$pesquisa%' OR conteudo LIKE '%$pesquisa%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloco de Notas</title>
</head>
<body>
    <h2>Minhas Notas</h2>
    <a href="create_note.php">Criar Nova Nota</a><br><br>
    
    <form method="get" action="index.php">
        Pesquisar: <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>">
        <input type="submit" value="Pesquisar">
    </form>
    <br>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h3>" . $row["titulo"] . "</h3>";
            echo "<p>" . $row["conteudo"] . "</p>";
            echo "<a href='edit_note.php?id=" . $row["id"] . "'>Editar</a> | ";
            echo "<a href='delete_note.php?id=" . $row["id"] . "'>Excluir</a><br><br>";
        }
    } else {
        echo "Nenhuma nota encontrada.";
    }
    ?>

</body>
</html>