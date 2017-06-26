<?php

session_start();

class classClinicaMedica{
    protected $pdo;

    private $host = "localhost";
    private $dbname = "carrolista";
    private $user = "root";
    private $senha = "";


    function __construct() {
        $this->conecta();
    }

    function conecta(){
        $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->senha");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}

?>