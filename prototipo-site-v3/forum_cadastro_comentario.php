<?php

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$topico = $_REQUEST['topico'];
$comentario = $_REQUEST['comentario'];


$sql = "INSERT INTO comentarios (topico, corpo)
        VALUES ('$topico','$comentario')";

$insert = mysqli_query($conn, $sql);

?>

<h2> Comentário Cadastrado!</h2>
<a href="./?pg=forum_detalhes&titulo=<?=$topico;?>">Voltar</a>

