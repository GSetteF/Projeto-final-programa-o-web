<?php

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];


$sql = "INSERT INTO usuarios (usuario, senha)
        VALUES ('$usuario','$senha')";

$insert = mysqli_query($conn, $sql);

?>

<h2> Usuário Cadastrado!</h2>
<a href="index.php">Voltar para tela de login</a>

