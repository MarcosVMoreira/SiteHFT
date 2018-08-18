<?php

session_start();
$login = $_POST['inputLogin'];
$senha = $_POST['inputPassword'];

include_once("conexao.php");


$query = "SELECT * FROM tabela_usuarios WHERE usu_login='$login' AND usu_password=MD5('$senha')";

if ($result = $conexao->query($query)) {


    $resultado = $result->fetch_assoc();
    
    if (empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos.";
        header("Location: login.php");
    } else {
        
        
        $_SESSION['usuarioId'] = $resultado["usu_id"];
        $_SESSION['usuarioNome'] =  $resultado["usu_nome"];
        $_SESSION['usuarioLogin'] =  $resultado["usu_login"];
        $_SESSION['usuarioSenha'] =  $resultado["usu_password"];
        $_SESSION['usuarioEmail'] =  $resultado["usu_email"];
        $_SESSION['usuarioNivelAcesso'] =  $resultado["usu_nivelAcesso"];
        header("Location: welcome.php");
    }
    

}

/* close connection */
$conexao->close();

?>