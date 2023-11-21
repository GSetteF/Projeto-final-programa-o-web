<?php
$conn = new mysqli("127.0.0.1", "root", "","bd_geral");

$id_musica = $_REQUEST['musica_id'];
#echo"$id_musica <br>";

$nome_playlist = $_REQUEST['musica_playlist'];
#echo "$nome_playlist";

$sql_alterar ="DELETE FROM " . "$nome_playlist" . " WHERE id_musica = '$id_musica' ";


$excluir = mysqli_query($conn, $sql_alterar);

?>

<h1> Música deletada com sucesso!</h1>

<a href="?pg=playlist_detalhes&playlist=<?=$nome_playlist; ?>">Voltar</a>