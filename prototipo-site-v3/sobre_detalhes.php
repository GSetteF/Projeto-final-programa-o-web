<?php

include_once("wikipedia_api.php");

include_once("./spotify_api/spotify_api_artist.php");

include_once("./spotify_api/spotify_api_top_rated.php");

$artista = $_POST["pesquisa"];

$conteudo_artista = pesquisa_artista($token, $artista);

$artista_id = $conteudo_artista -> artists -> items[0]->id;

$musicas_mais_escutadas = get_top_rated($token, $artista_id);

$resumo_wiki = pesquisa_wiki($artista) . "<a href='https://pt.wikipedia.org/wiki/$artista' target='_blank'> Saiba Mais:</a>";


?>

<h2> Um pequeno resumo sobre <?php echo"$artista";?></h2>

<p> <?php echo"$resumo_wiki";?></p>

<?php
$i = 1;
echo "As músicas mais escutadas de $artista no spotify BR : <br>";
foreach ($musicas_mais_escutadas as $musicas_mais_escutadas) {
$nome = $musicas_mais_escutadas -> name;
echo" $i ° : $nome <br>";
$i ++;
}

?>

<form action="index.php" method="get">
<input type="submit" value="Voltar para o menu inicial">
</form> 

