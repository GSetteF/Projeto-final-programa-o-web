<?php

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$titulo = $_REQUEST['titulo'];
$corpo = $_REQUEST['corpo'];

$sql = "INSERT INTO Topicos (titulo, corpo)
        VALUES ('$titulo','$corpo')";

$insert = mysqli_query($conn, $sql);

?>

<h2> Discussão Cadastrada!</h2>
<a href="./?pg=forum_home">Voltar</a>