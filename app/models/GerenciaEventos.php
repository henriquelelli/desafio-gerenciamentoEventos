<?php

class GerenciaEventos
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO eventos (titulo, descricao, data) VALUES ('teste', 'primeiro teste', '2023-05-01 00:00:00')";
        
        $statement = $this->connection->prepare($sql);

        $statement->bind_param("sss", $data['titulo'], $data['descricao'], $data['data']);

        if ($statement->execute())
            return true;
        else
            return false;
    }
}