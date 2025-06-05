<?php
$db = new SQLite3('database.db');

$nome = $_POST['nome'];
$email = $_POST['email'];

$db->exec("INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')");

header('Location: index.php');
?>
