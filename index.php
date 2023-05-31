<?php
require_once 'database.php';
require_once 'app/controllers/EventController.php';
require_once 'app/models/GerenciaEventos.php';

$database = new Database();

$connection = $database->getConnection();

$gerenciaEventos = new GerenciaEventos($connection);

$eventController = new EventController($gerenciaEventos);

$eventController->handleRequest();

$connection->close();
