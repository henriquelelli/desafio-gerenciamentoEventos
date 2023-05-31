<?php

class Database {
    private $servername = "127.0.0.1:3306";
    private $username = "u822896253_henriquelelli";
    private $password = "Hcl@330469";
    private $dbname = "u822896253_skedway";
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
