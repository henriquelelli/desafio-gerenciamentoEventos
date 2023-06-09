<?php

class EventController
{
    private $gerenciaEventos;

    public function __construct($gerenciaEventos)
    {
        $this->gerenciaEventos = $gerenciaEventos;
    }

    public function handleLogin($usuario, $senha)
    {
        $resultado = $this->gerenciaEventos->verificaLogin($usuario, $senha);
        
        if ($resultado === 'true'){
            $this->renderGerenciaEventos();
        }
        else{
            $this->renderLogin($resultado);
        }
    }
    
    private function handleCreate()
    {
        if (isset($_POST['titulo']) && isset($_POST['descricao']) && isset($_POST['data'])) {
            
            $data = [
                'titulo' => $_POST['titulo'],
                'descricao' => $_POST['descricao'],
                'data' => $_POST['data']
            ];

            $result = $this->gerenciaEventos->insert($data);
            
            if ($result) {
                header("Location: success.php");
                exit();
            } else {
                header("Location: error.php");
                exit();
            }
        }
    }
    
    private function handleRead()
    {
        // Lógica para ler registros do banco de dados e exibi-los
    }

    private function handleUpdate()
    {
        // Lógica para atualizar registros no banco de dados
    }

    private function handleDelete()
    {
        // Lógica para excluir registros do banco de dados
    }
    
    private function handleNotFound()
    {
        // Lógica para lidar com rotas não encontradas
    }
    
    public function renderLogin($resultado = null)
    {
        include_once 'app/views/login.phtml';
    }

    private function renderGerenciaEventos()
    {
        include_once 'app/views/gerencia-eventos.phtml';
    }

    public function handleRequest()
    {

        session_start();
        
        if (isset($_SESSION['user'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->handleCreate();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $this->handleCreate();
                $this->handleRead();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                $this->handleUpdate();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
                $this->handleDelete();
            } else {
                $this->handleNotFound();
            }
        } else
            $this->renderLogin();
    }
}

