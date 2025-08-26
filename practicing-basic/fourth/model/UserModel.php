<?php
require_once __DIR__ . '/ConnectionDB.php';

class UserModel
{
    public $id;
    private $nome;
    private $email;
    private $telefone;

    public function __construct($nome, $email, $telefone){ $this->nome = $nome; $this->email = $email; $this->telefone = $telefone; }

    public function get_id(){ return $this->id; }

    public function get_nome(){ return $this->nome; }

    public function get_email(){ return $this->email; }

    public function get_telefone(){ return $this->telefone; }

    public function saveUser()
    {
        try {
            $pdo = ConnectionDB::getConexao();
            $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES (:nome, :email, :telefone)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":nome", $this->nome);
            $stmt->bindValue(":email", $this->email);
            $stmt->bindValue(":telefone", $this->telefone);
            $stmt->execute();

            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            die("Erro ao salvar usuário: " . $e->getMessage());
        }
    }

    public function listUsers()
    {
        try {
            $pdo = ConnectionDB::getConexao();
            $sql = "SELECT idUsuario AS id, nome, email, telefone FROM usuarios";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao listar usuários: " . $e->getMessage());
        }
    }

    public  function deleteUser($id)
    {
        try {
            $pdo = ConnectionDB::getConexao();
            $sql = "DELETE FROM usuarios WHERE idUsuario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Erro ao deletar usuário: " . $e->getMessage());
        }
    }

    public function getUserById($id)
    {
        try {
            $pdo = ConnectionDB::getConexao();
            $sql = "SELECT idUsuario AS id, nome, email, telefone FROM usuarios WHERE idUsuario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar usuário: " . $e->getMessage());
        }
    }

    public function updateUser($id, $nome, $email, $telefone)
    {
        try {
            $pdo = ConnectionDB::getConexao();
            $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE idUsuario = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Erro ao atualizar usuário: " . $e->getMessage());
        }
    }
}