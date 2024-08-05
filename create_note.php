<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $categoria_id = $_POST['categoria_id'];

    $sql = "INSERT INTO notas (titulo, conteudo, categoria_id) VALUES ('$titulo', '$conteudo', $categoria_id)";

    if ($conn->query($sql) === TRUE) {
        echo "Nota criada com sucesso!";
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
    <title>Criar Nota</title>
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
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <h2>Criar Nova Nota</h2>
        <form method="post" action="create_note.php">
            Título: <input type="text" name="titulo" required><br><br>
            Conteúdo: <textarea name="conteudo" required></textarea><br><br>
            Categoria: 
            <select name="categoria_id" required>
                <?php while ($row = $categorias->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <input type="submit" value="Salvar Nota">
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>