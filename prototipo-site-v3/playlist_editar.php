<?php

$id_musica_antiga = $_REQUEST['musica_id'];

$nome_playlist = $_REQUEST['musica_playlist'];

?>

<h1> Altere a Música</h1>

<h3> Música Atual:</h3>

<iframe style="border-radius: 12px;" src="<?php echo "https://open.spotify.com/embed/track/".$id_musica_antiga."?utm_source=generator"; ?>" width="50%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
</iframe>
<br>
<form action="?pg=playlist_alterar_bd" method="post">
<label> Insira a nova Música </label>
<input type="search" name="pesquisa"> <br>
<input type="hidden" name="playlist" value="<?= $nome_playlist;?>">
<input type="hidden" name="id_musica_antiga" value="<?= $id_musica_antiga;?>">
<input type="submit" value="Alterar">

</form>