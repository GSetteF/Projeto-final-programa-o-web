<?php

function verificar_existencia_usuario_e_senha(  $usuario, $senha ) {
    if (strlen($usuario) == 0){
        return "Preencha o campo de usuário";
    }
    else if (strlen($senha) == 0){
        return "Preencha o campo de senha";
    }

}

$conn = new mysqli("127.0.0.1", "root", "","BD_geral");

$usuario = $_REQUEST['usuario'];
$senha = $_REQUEST['senha'];

$erro = verificar_existencia_usuario_e_senha($usuario, $senha);

if (isset($erro)){
    echo "$erro";
}
else{


$sql = "SELECT * FROM `usuarios` 
        WHERE usuario = '$usuario' AND senha = '$senha'";

$busca = mysqli_query($conn,$sql);

$colunas = mysqli_num_rows($busca);



if ($colunas == 1){
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: ./?pg=playlist_home");
}
else{
    echo "Usuário e/ou senha inválidos !";
}



}
?>