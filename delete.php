<?php
$db = new SQLite3('database.db');
$id = $_GET['id'];
$db->exec("DELETE FROM usuarios WHERE id=$id");
header('Location: index.php');
?>
