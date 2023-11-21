<?php
$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$sql = "CREATE TABLE $nome_playlist (
    usuario VARCHAR(255) NOT NULL,
    id_musica VARCHAR(255) NOT NULL

)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro ao criar a tabela: " . $conn->error;
}

?>