<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/user.php';

class UserRepository {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create(User $user) {

        $sql = "INSERT INTO users (nome, email, senha, nivel)
                VALUES (:nome, :email, :senha, :nivel)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':nome', $user->nome);
        $stmt->bindValue(':email', $user->email);
        $stmt->bindValue(':senha', $user->senha);
        $stmt->bindValue(':nivel', $user->nivel);

        return $stmt->execute();
    }

    public function findByEmail($email) {

        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id) {

        $sql = "SELECT * FROM users WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}