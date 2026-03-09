<?php

require_once __DIR__ . '/../repositories/userRepository.php';
require_once __DIR__ . '/../models/user.php';

class AuthController {

    private $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function register() {

        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data['username'];
        $email = $data['email'];
        $password = password_hash($data['senha'], PASSWORD_BCRYPT);

        $user = new User($name, $email, $password);

        $result = $this->userRepository->create($user);

        if ($result) {
            echo json_encode(["message" => "Usuário criado com sucesso"]);
        } else {
            echo json_encode(["error" => "Erro ao criar usuário"]);
        }
    }


    /* Função para Login */
    public function login() {

        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'];
        $password = $data['senha'];

        $user = $this->userRepository->findByEmail($email);

        if ($user && password_verify($password, $user['senha'])) {
            echo json_encode([
                "message" => "Tudo certo, meu patrão! Pode entrar.",
                "user" => $user
            ]);
        } else {
            echo json_encode([
                "error" => "Algo de errado não está certo. Verifique sua senha e email."
            ]);
        }
    }

}