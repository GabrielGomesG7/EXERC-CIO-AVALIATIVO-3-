<?php
// Conexão com o banco de dados
$db = new SQLite3('database.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar edição
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    // Atualizar no banco de dados
    $stmt = $db->prepare("UPDATE usuarios SET nome=:nome, email=:email WHERE id=:id");
    $stmt->bindValue(':nome', $nome, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
    
    // Redirecionar
    header('Location: index.php');
    exit;
} else {
    // Obter dados para edição
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE id=:id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $res = $stmt->execute();
    $row = $res->fetchArray();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $row['nome'] ?>">
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $row['email'] ?>">
        </div>
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>