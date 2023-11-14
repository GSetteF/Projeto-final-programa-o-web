<?php
$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$sql = "CREATE TABLE Topicos (
    topic_id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    corpo TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

?>