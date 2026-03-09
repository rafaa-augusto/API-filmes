<?php

require_once __DIR__ . '/../repositories/movieRepository.php';
require_once __DIR__ . '/../models/movie.php';

class MovieController {

    private $movieRepository;

    public function __construct() {
        $this->movieRepository = new MovieRepository();
    }

    public function listMovies() {

        $movies = $this->movieRepository->findAll();

        echo json_encode($movies);
    }

    public function getMovie($id) {

        $movie = $this->movieRepository->findById($id);

        if ($movie) {
            echo json_encode($movie);
        } else {
            echo json_encode(["error" => "Filme não encontrado"]);
        }
    }

    public function createMovie() {

        $data = json_decode(file_get_contents("php://input"), true);

        $movie = new Movie(
            $data['titulo'],
            $data['descricao'],
            $data['imagem'],
            $data['video'],
            $data['categoria_id']
        );

        $result = $this->movieRepository->create($movie);

        if ($result) {
            echo json_encode(["message" => "Filme criado com sucesso"]);
        } else {
            echo json_encode(["error" => "Erro ao criar filme"]);
        }
    }

    public function deleteMovie($id) {

        $result = $this->movieRepository->delete($id);

        if ($result) {
            echo json_encode(["message" => "Filme deletado"]);
        } else {
            echo json_encode(["error" => "Erro ao deletar filme"]);
        }
    }

}