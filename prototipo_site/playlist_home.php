<?php

include_once("verificar_login.php");

$usuario = $_SESSION["usuario"];

?>

<h1> Minha Playlist !</h1>
<h2> 
    Bem-vindo(a) de volta <?= $usuario;?>
</h2>

<form action="?pg=login_logout" method="post">
<input type="submit" value="Logout">
</form> 