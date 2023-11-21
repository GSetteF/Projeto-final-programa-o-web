<?php

$nome_playlist =$_REQUEST['playlist'];

$conn = new mysqli("127.0.0.1", "root", "","bd_geral");
$busca = "Select * from $nome_playlist order by id_musica";

$objetos = mysqli_query($conn, $busca);

?>

<style>
    table {
            width: 100%;
            border-collapse: collapse;
        }
</style>

<h1> <?=$nome_playlist; ?></h1>

<form action="?pg=playlist_cadastro_playlist_unitaria" method="post">

<input type="hidden" name="nome_playlist" value="<?= $nome_playlist;?>">
<label> Adicione uma nova música !</label> <br>
<input type="search" name="pesquisa">


<input type="submit" value="Pesquisar"> 
</form>
<br>
<table>
<?php 
while ($dados = mysqli_fetch_array($objetos)) {
?>
    <tr>
    <th> <iframe style="border-radius: 12px;" src="<?php echo "https://open.spotify.com/embed/track/".$dados['id_musica']."?utm_source=generator"; ?>" width="50%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
    </iframe> </th>
    <th> <a href="?pg=playlist_editar&musica_playlist=<?=$nome_playlist; ?>&musica_id=<?=$dados['id_musica']; ?>"> Editar</a> </th>
    <th> <a href="?pg=playlist_excluir&musica_playlist=<?=$nome_playlist; ?>&musica_id=<?=$dados['id_musica']; ?>"> Excluir</a> </th>
    <tr>
<?php } ?>
</table>
<br>
<a href="?pg=playlist_home">Voltar</a>