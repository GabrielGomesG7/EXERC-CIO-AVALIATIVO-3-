<?php
$db = new SQLite3('database.db');
$result = $db->query('SELECT * FROM usuarios');
?>

<!DOCTYPE html>
<html>
<head>
  <title>CRUD com PHP e SQLite</title>
  <link rel="stylesheet" href="style.css">
  <script src="js/validate.js"></script>
</head>
<body>
  <h1>CRUD com PHP, JavaScript e SQLite</h1>
  <form action="create.php" method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="nome" placeholder="Nome">
    <input type="email" name="email" placeholder="Email">
    <button type="submit">Cadastrar</button>
  </form>

  <h2>Lista de Usuários</h2>
  <table border="1">
    <tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>
    <?php while ($row = $result->fetchArray()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nome'] ?></td>
        <td><?= $row['email'] ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
          <a href="delete.php?id=<?= $row['id'] ?>">Excluir</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
