<?php

class User {
    public $id;
    public $username;
    public $email;
    public $senha;
    public $nivel;


    public function __construct($username, $email, $senha, $nivel ='user'){
        $this -> username = $username;
        $this -> email = $email;
        $this -> senha = $senha;
        $this -> nivel = $nivel;

    }


}