<?php

session_start();

class Conexao{
    protected $pdo;

    private $host = "localhost";
    private $dbname = "u118203534_carro";
    private $user = "u118203534_root";
    private $senha = "ollirum";


    function __construct() {
        $this->conecta();
    }

    function conecta(){
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->senha");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}

?>