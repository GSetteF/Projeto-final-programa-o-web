<?php

$titulo = $_REQUEST['titulo'];

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$busca = "SELECT corpo FROM topicos WHERE titulo = '$titulo'";

$corpo = mysqli_query($conn, $busca);

$dados_corpo = mysqli_fetch_assoc($corpo)['corpo'];

$busca_comentarios = "SELECT corpo FROM `comentarios` WHERE topico = '$titulo' order by comentario_id" ;

$comentarios = mysqli_query($conn, $busca_comentarios);

?>

<h1> <?= $titulo;?> </h1>

<p> <?= $dados_corpo;?> </p>

<ul>

<?php

while ($dados = mysqli_fetch_array($comentarios)){?>
    
    <li>        
        <td> <?=  $dados['corpo'];?></td>
</li>
    
    <?php } ?>

</ul>

<form action="?pg=forum_cadastro_comentario" method="post">

<label> Escreva um comentário: </label>
<input type="text" name="comentario"><br>

<input type="submit" value="Publicar">

<input type="hidden" name="topico" value="<?= $titulo;?>">

</form>