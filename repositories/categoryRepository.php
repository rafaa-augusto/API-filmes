<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/category.php';

class CategoryRepository {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create(Category $category) {

        $sql = "INSERT INTO categories (nome) VALUES (:nome)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $category->nome);

        return $stmt->execute();
    }

    public function findAll() {

        $sql = "SELECT * FROM categories";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {

        $sql = "SELECT * FROM categories WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}