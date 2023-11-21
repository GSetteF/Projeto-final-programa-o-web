<?php

$pesquisa = $_REQUEST['pesquisa'];
$playlist = $_REQUEST['playlist'];
$id_musica_antiga = $_REQUEST['id_musica_antiga'];

include_once("spotify_api\spotify_api_track.php");

$resultado = pesquisa_musica($token, $pesquisa);

#$album = $resultado->tracks->items[0]->album->name;

#$musica = ($resultado->tracks->items[0]->name);

#$url_musica = $resultado->tracks->items[0]->external_urls->spotify;

#$url_icone = $resultado->tracks->items[0]->album->images[2]->url;

#$artista = $resultado->tracks->items[0]->artists[0]->name;

#$url_artista = $resultado->tracks->items[0]->artists[0]->external_urls->spotify;

$id_musica_nova = $resultado->tracks->items[0]->id;


$conn = new mysqli("127.0.0.1", "root", "","bd_geral");

$sql = "UPDATE " . "$playlist" . " SET id_musica='$id_musica_nova' WHERE id_musica='$id_musica_antiga'";

$insert = mysqli_query($conn, $sql);

?>

<a href="?pg=playlist_detalhes&playlist=<?=$nome_playlist; ?>">Voltar</a>