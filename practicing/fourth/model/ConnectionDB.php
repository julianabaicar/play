<?php
require_once __DIR__ . '/env.php';
carregarEnv(); // ← ESSENCIAL para carregar as variáveis do .env

class ConnectionDB {
    private static $instancia = null;

    public static function getConexao() {
        if (self::$instancia === null) {
            try {
                $tipo = getenv('DB_CONNECTION');
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_DATABASE');
                $usuario = getenv('DB_USERNAME');
                $senha = getenv('DB_PASSWORD');

                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
                self::$instancia = new PDO($dsn, $usuario, $senha);
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }

        return self::$instancia;
    }
}