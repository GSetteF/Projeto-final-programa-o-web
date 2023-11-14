<?php
$servername = "127.0.0.1"; // Endereço do servidor MySQL
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL

// Conecte ao servidor MySQL
$conn = new mysqli($servername, $username, $password);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Nome do banco de dados que você deseja criar
$databaseName = "BD_geral";

// SQL para criar o banco de dados
$sql = "CREATE DATABASE $databaseName";

if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

// Feche a conexão com o servidor MySQL
$conn->close();
?>