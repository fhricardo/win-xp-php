<?php
// Conexão com o banco de dados
$server = "localhost:3306";
$user = "root";
$password = "";
$database = "ecommerce";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);
    // Configura o PDO pra lançar exceções e usar prepared statements nativamente
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
