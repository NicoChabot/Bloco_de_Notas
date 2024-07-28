<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "Categoria criada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT id, nome FROM categorias";
$categorias = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Categorias</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1 id="branding">Bloco de Notas</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Minhas Notas</a></li>
                    <li><a href="create_note.php">Criar Nota</a></li>
                    <li><a href="manage_categories.php">Gerenciar Categorias</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Gerenciar Categorias</h2>
        <form method="post" action="manage_categories.php">
            Nome da Categoria: <input type="text" name="nome" required><br><br>
            <input type="submit" value="Salvar Categoria">
        </form>
        <br>
        <h2>Categorias Existentes</h2>
        <ul>
            <?php while ($row = $categorias->fetch_assoc()): ?>
                <li><?php echo $row['nome']; ?></li>
            <?php endwhile; ?>
        </ul>
    </div>
    <script src="scripts.js"></script>
</body>
</html>