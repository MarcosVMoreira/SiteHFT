<?php
    ob_start();


    if (($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioLogin'] == "") || 
    ($_SESSION['usuarioSenha'] == "") || ($_SESSION['usuarioEmail'] == "") || ($_SESSION['usuarioNivelAcesso'] == "")) {
        unset($_SESSION['usuarioId'],
        $_SESSION['usuarioNome'] ,
        $_SESSION['usuarioLogin'],
        $_SESSION['usuarioSenha'],
        $_SESSION['usuarioEmail'],
        $_SESSION['usuarioNivelAcesso']);
        
        
        
        $_SESSION['loginErro'] = "Área restrita para usuários cadastrados.";
        header("Location: login.php");
    }


?>
