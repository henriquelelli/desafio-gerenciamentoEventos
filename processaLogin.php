<?php
require_once 'database.php';
require_once 'app/controllers/EventController.php';
require_once 'app/models/GerenciaEventos.php';

$database = new Database();
$connection = $database->getConnection();

$gerenciaEventos = new GerenciaEventos($connection);
$eventController = new EventController($gerenciaEventos);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    echo "teste antes do handle <br>";
    $eventController->handleLogin($usuario, $senha);
    echo "teste depois";
} else {
    header("Location: error.php");
    exit();
}

$connection->close();
