<?php

class Database {
    private $servername = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $dbname = "gerenciamentoEventos";
    private $connection;

    public function __construct() {

        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->connection->connect_error) {
            die("Falha na conexão com o banco de dados: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
