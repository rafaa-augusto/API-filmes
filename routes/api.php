<?php

require_once __DIR__ . '/../controllers/authController.php';
require_once __DIR__ . '/../controllers/movieController.php';
require_once __DIR__ . '/../controllers/categoryController.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = explode('/', trim($uri, '/'));


// ROTAS DE AUTENTICAÇÃO

if ($uri[0] === 'api' && $uri[1] === 'register' && $method === 'POST') {

    $controller = new AuthController();
    $controller->register();
    exit;
}

if ($uri[0] === 'api' && $uri[1] === 'login' && $method === 'POST') {

    $controller = new AuthController();
    $controller->login();
    exit;
}


// ROTAS DE FILMES

if ($uri[0] === 'api' && $uri[1] === 'movies' && $method === 'GET' && !isset($uri[2])) {

    $controller = new MovieController();
    $controller->listMovies();
    exit;
}

if ($uri[0] === 'api' && $uri[1] === 'movies' && $method === 'GET' && isset($uri[2])) {

    $controller = new MovieController();
    $controller->getMovie($uri[2]);
    exit;
}

if ($uri[0] === 'api' && $uri[1] === 'movies' && $method === 'POST') {

    $controller = new MovieController();
    $controller->createMovie();
    exit;
}

if ($uri[0] === 'api' && $uri[1] === 'movies' && $method === 'DELETE' && isset($uri[2])) {

    $controller = new MovieController();
    $controller->deleteMovie($uri[2]);
    exit;
}


// ROTAS DE CATEGORIAS

if ($uri[0] === 'api' && $uri[1] === 'categories' && $method === 'GET') {

    $controller = new CategoryController();
    $controller->listCategories();
    exit;
}


// ROTA NÃO ENCONTRADA

http_response_code(404);
echo json_encode([
    "error" => "Rota não encontrada"
]);