<?php

include_once("verificar_login.php");

$usuario = $_SESSION["usuario"];

$conn = new mysqli("127.0.0.1", "root", "","bd_geral");
$busca = "SELECT * FROM playlists_por_usuario WHERE usuario = '$usuario' ORDER BY nome";

$objetos = mysqli_query($conn, $busca);

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<h1> Minha Playlist !</h1>
<h2> 
    Bem-vindo(a) de volta <?= $usuario;?>
</h2>

<h3> Deseja Criar uma nova Playlist ?</h3>

<form action="?pg=playlist_cadastro_playlists" method="post">
<label> Insira o nome da nova playlist: </label>
<input type="text" name="nome_playlist"> <br>
<input type="hidden" name="usuario" value="<?= $usuario;?>">
<input type="submit" value="Clique aqui!">
</form>
<br>
<div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Minhas playlists
  </a>
  <ul class="dropdown-menu">
  <?php 
    while ($dados=mysqli_fetch_array($objetos)) {?>
    
        <li><a class="dropdown-item" href="?pg=playlist_detalhes&playlist=<?=$dados['nome']; ?>"><?=$dados['nome']; ?></a></li>

    <?php } ?>
    
    
  </ul>
</div>



<form action="?pg=login_logout" method="post">
<input type="submit" value="Logout">
</form> 
