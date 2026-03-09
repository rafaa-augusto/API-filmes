<?php

require_once __DIR__ . '/../repositories/categoryRepository.php';

class CategoryController {

    private $categoryRepository;

    public function __construct() {
        $this->categoryRepository = new CategoryRepository();
    }

    public function listCategories() {

        $categories = $this->categoryRepository->findAll();

        echo json_encode($categories);
    }

}