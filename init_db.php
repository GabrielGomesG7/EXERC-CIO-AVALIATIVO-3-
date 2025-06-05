<?php
// Cria ou conecta ao banco SQLite no mesmo diretório
$db = new SQLite3(__DIR__ . '/database.db');

if (!$db) {
    die("Erro ao criar o banco: " . $db->lastErrorMsg());
}

// Cria tabela
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    email TEXT NOT NULL
)";

if ($db->exec($sql)) {
    echo "Banco de dados e tabela criados com sucesso.";
} else {
    echo "Erro ao criar a tabela: " . $db->lastErrorMsg();
}

$db->close();
?>
