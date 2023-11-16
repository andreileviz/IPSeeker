<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $ip = $_POST["ip"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $port = isset($_POST["port"]) ? $_POST["port"] : '';

    // Configurações do banco de dados
    $host = 'bancotcc.ceg5elbu33gs.us-east-1.rds.amazonaws.com';
    $usuario = 'admin';
    $senha = '123456789';
    $banco = 'cgnat'; 
    $porta = '3306';

    // Conectar ao banco de dados usando MySQLi
    $conn = new mysqli($host, $usuario, $senha, $banco, $porta);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    } else {
        echo 'conectado ao banco de dados';
    }

    $sql = "SHOW TABLES";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo $row["Tables_in_$banco"]. "<br>";
    }
    } else {
        echo "Nenhuma tabela encontrada.";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    }
?>


