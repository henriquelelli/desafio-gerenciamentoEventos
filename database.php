<?php

$servername = "localhost:8443";
$username = "";
$password = "";
$dbname = "gerenciamentoEventos";

$connection = new mysqli($servername, $user, $password, $dbname);

if($connection->connect_error){
    die("Erro na conexão com o bando de dados: " . $connection->connect_error);
}