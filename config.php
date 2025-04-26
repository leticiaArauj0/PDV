<?php
    $host = getenv("MYSQLHOST");
    $database = getenv("MYSQLDATABASE");
    $username = getenv("MYSQLUSER");
    $password = getenv("MYSQLPASSWORD");

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
?>
