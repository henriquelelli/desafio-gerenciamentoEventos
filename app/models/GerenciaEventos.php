<?php

class GerenciaEventos
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function verificaLogin($usuario, $senha)
    {
        $query = "SELECT * FROM usuarios WHERE nome = ? AND senha = ?";
        $sql = $this->getConnection()->prepare($query);
        $sql->bind_param("ss", $usuario, $senha);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result && $result->num_rows > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }


    public function insert($dados)
    {
        $sql = "INSERT INTO eventos (titulo, descricao, dados) 
                VALUES ({$dados['titulo']}, {$dados['descricao']}, {$dados['data']})";
        
        $statement = $this->connection->prepare($sql);

        $statement->bind_param("sss", $dados['titulo'], $dados['descricao'], $dados['data']);

        if ($statement->execute())
            return true;
        else
            return false;
    }
}