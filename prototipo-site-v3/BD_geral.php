<?php

//Arquivo para criação do banco de dados e todas as tabelas fixas

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
$nome_bd = "BD_geral";

// SQL para criar o banco de dados
$sql = "CREATE DATABASE $nome_bd";

if ($conn->query($sql) === TRUE) {
    echo "Banco de dados criado com sucesso!";
} else {
    echo "Erro ao criar o banco de dados: " . $conn->error;
}

//realizando uma nova conexão, agora com o BD
$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$sql = "CREATE TABLE Topicos (
    topic_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    corpo TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela Tópicos criada com sucesso!";
} else {
    echo "Erro ao criar a tabela Tópicos: " . $conn->error;
}

$sql = "CREATE TABLE comentarios (
    comentario_id INT AUTO_INCREMENT PRIMARY KEY,
    topico VARCHAR(255) NOT NULL,
    corpo TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de comentários criada com sucesso!";
} else {
    echo "Erro ao criar a tabela de comentários: " . $conn->error;
}

$sql = "CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de usuários criada com sucesso!";
} else {
    echo "Erro ao criar a tabela de usuários: " . $conn->error;
}

$sql = "CREATE TABLE playlists_por_usuario (
    usuario VARCHAR(255) NOT NULL,
    nome VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela de playlists por usuário criada com sucesso!";
} else {
    echo "Erro ao criar a tabela de playlists por usuário: " . $conn->error;
}



// Feche a conexão com o servidor MySQL
$conn->close();

?>