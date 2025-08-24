<?php
require_once __DIR__ . '/../model/ConnectionDB.php'; // Ajusta o caminho conforme a tua estrutura

try {
    $conexao = ConnectionDB::getConexao();
    echo "✅ Conexão com o banco de dados estabelecida com sucesso!\n";
} catch (Exception $e) {
    echo "❌ Falha na conexão: " . $e->getMessage() . "\n";
}