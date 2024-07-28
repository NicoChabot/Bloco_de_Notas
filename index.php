<?php
include 'config.php';

$pesquisa = $_GET['pesquisa'] ?? '';
$categoria_id = $_GET['categoria_id'] ?? '';

$sql = "SELECT id, titulo, conteudo, data_criacao FROM notas WHERE (titulo LIKE '%$pesquisa%' OR conteudo LIKE '%$pesquisa%')";
if ($categoria_id != '') {
    $sql .= " AND categoria_id = $categoria_id";
}
$result = $conn->query($sql);

$sql = "SELECT id, nome FROM categorias";
$categorias = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bloco de Notas</title>
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
        <h2>Minhas Notas</h2>
        <form method="get" action="index.php">
            Pesquisar: <input type="text" name="pesquisa" value="<?php echo $pesquisa; ?>">
            Categoria: 
            <select name="categoria_id">
                <option value="">Todas</option>
                <?php while ($row = $categorias->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $categoria_id) echo 'selected'; ?>><?php echo $row['nome']; ?></option>
                <?php endwhile; ?>
            </select>
            <input type="submit" value="Pesquisar">
        </form>
        <br>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='note'>";
                echo "<h3>" . $row["titulo"] . "</h3>";
                echo "<p>" . $row["conteudo"] . "</p>";
                echo "<a class='button' href='edit_note.php?id=" . $row["id"] . "'>Editar</a> ";
                echo "<a class='button delete' href='delete_note.php?id=" . $row["id"] . "'>Excluir</a>";
                echo "</div>";
            }
        } else {
            echo "Nenhuma nota encontrada.";
        }
        ?>
    </div>
    <script src="scripts.js"></script>
</body>
</html>