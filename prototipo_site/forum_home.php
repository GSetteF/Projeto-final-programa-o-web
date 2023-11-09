<h1>Fórum de discussão</h1>
<a href="?pg=forum_formulario"> Criar Novo Tópico</a>

<?php

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$busca = "Select * from Topicos order by topic_id";

$objetos = mysqli_query($conn, $busca);

?>

<ul>

<?php

while ($dados = mysqli_fetch_array($objetos)){?>
    
    <li>        
        <td><a href="?pg=forum_detalhes&titulo=<?=$dados['titulo']; ?>"> <?=$dados['titulo'];?></a></td>
</li>
    
    <?php } ?>

</ul>