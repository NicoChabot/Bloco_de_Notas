<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $categoria_id = $_POST['categoria_id'];

    $sql = "UPDATE notas SET titulo='$titulo', conteudo='$conteudo', categoria_id=$categoria_id WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Nota atualizada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, titulo, conteudo, categoria_id FROM notas WHERE id=$id";
    $result = $conn->query($sql);
    $nota = $result->fetch_assoc();
}

$sql = "SELECT id, nome FROM categorias";
$categorias = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Nota</title>
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
        <h2>Editar Nota</h2>
        <form method="post" action="edit_note.php">
            <input type="hidden" name="id" value="<?php echo $nota['id']; ?>">
            Título: <input type="text" name="titulo" value="<?php echo $nota['titulo']; ?>" required><br><br>
            Conteúdo: <textarea name="conteudo" required><?php echo $nota['conteudo']; ?></textarea><br><br>
            Categoria: 
            <select name="categoria_id" required>
                <?php while ($row = $categorias->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $nota['categoria_id']) echo 'selected'; ?>><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select><br><br>
            <input type="submit" value="Salvar Alterações">
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>