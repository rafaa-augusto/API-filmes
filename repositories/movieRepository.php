<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Movie.php';

class MovieRepository {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create(Movie $movie) {

        $sql = "INSERT INTO movies 
                (title, descricao, imagem, video_url, categoria_id)
                VALUES (:title, :descricao, :imagem, :video_url, :categoria_id)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':title', $movie->title);
        $stmt->bindValue(':descricao', $movie->descricao);
        $stmt->bindValue(':imagem', $movie->imagem);
        $stmt->bindValue(':video_url', $movie->video_url);
        $stmt->bindValue(':categoria_id', $movie->categoria_id);

        return $stmt->execute();
    }

    public function findAll() {

        $sql = "SELECT * FROM movies";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {

        $sql = "SELECT * FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id) {

        $sql = "DELETE FROM movies WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

}