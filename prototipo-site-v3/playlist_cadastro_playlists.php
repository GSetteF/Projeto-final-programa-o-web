<?php

$usuario = $_POST["usuario"];
$nome_playlist = $_POST["nome_playlist"];
$nome_playlist = preg_replace("/[^a-zA-Z0-9_]+/", "", $nome_playlist);

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");


$sql = "INSERT INTO playlists_por_usuario (usuario, nome)
        VALUES ('$usuario','$nome_playlist')";

$insert = mysqli_query($conn, $sql);

$sql2 = "CREATE TABLE $nome_playlist (
         id_musica VARCHAR(255) NOT NULL
        )";

$criar = mysqli_query($conn, $sql2);

?>

<h2> Playlist cadastrada!</h2>
<a href="./?pg=playlist_home">Voltar</a>
