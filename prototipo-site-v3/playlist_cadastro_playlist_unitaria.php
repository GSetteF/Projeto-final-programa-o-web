<?php

$nome_playlist = $_POST["nome_playlist"];

$pesquisa = $_POST["pesquisa"];

include_once("spotify_api\spotify_api_track.php");

$resultado = pesquisa_musica($token, $pesquisa);

#$album = $resultado->tracks->items[0]->album->name;

#$musica = ($resultado->tracks->items[0]->name);

#$url_musica = $resultado->tracks->items[0]->external_urls->spotify;

#$url_icone = $resultado->tracks->items[0]->album->images[2]->url;

#$artista = $resultado->tracks->items[0]->artists[0]->name;

#$url_artista = $resultado->tracks->items[0]->artists[0]->external_urls->spotify;

$musica_id = $resultado->tracks->items[0]->id;

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$sql = "INSERT INTO $nome_playlist (id_musica)
        VALUES ('$musica_id')";

$insert = mysqli_query($conn, $sql);

?>

<h2> Música cadastrada!</h2>
<a href="./?pg=playlist_home">Voltar</a>