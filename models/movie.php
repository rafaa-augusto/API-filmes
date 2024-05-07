<?php

class Movie {
    public $id;
    public $titulo;
    public $descricao;
    public $ano;
    public $categoria_id;
    public $imagem;
    public $video;


    public function __construct($titulo, $descricao, $ano, $categoria_id, $imagem, $video{

        $this -> titulo = $titulo;
        $this -> descricao  = $descricao;
        this -> ano = $ano;
        this -> genero = $categoria_id;
        this -> imagem = $imagem;
        this -> video = $video;

    }
}