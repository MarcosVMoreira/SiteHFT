<?php

session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>HFT System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <!-- depois trocar esse icone por um bom -->
        <link rel="icon" id="favicon" href="img/favicon.png" type="image/x-icon">
        <!-- fontes usadas -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Quattrocento+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/estiloHFT.css">
        

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    </head>
    <body>
        <?php
            unset($_SESSION['usuarioId'],
            $_SESSION['usuarioNome'] ,
            $_SESSION['usuarioLogin'],
            $_SESSION['usuarioSenha'],
            $_SESSION['usuarioEmail'],
            $_SESSION['usuarioNivelAcesso']);
        ?>



        <nav class="navbar navbar-default navbar-hft">
            <div class="container">
                <div class="navbar-header"> 
                    <!-- colocar um logo melhor aqui-->
                    <a href="index.php" class="navbar-brand"><img id="navbar-brand-hftLogo" src="img/logo.png"></a>

                    <button class="navbar-toggle glyphicon glyphicon-menu-hamburger"
                            data-toggle="collapse" data-target="#navbar-hftsystem"></button>
                    
                </div>

                <ul id="navbar-hftsystem" class="nav navbar-nav navbar-right collapse navbar-collapse">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sobreSimulador.php">Sobre o simulador</a></li>
                    <li><a href="simular.php">Simular</a></li>
                    <li><a href="contato.php">Contato</a></li>
                    <li><a href="registration.html">Registrar</a></li>
                    <li class="active"><a href="login.php">Login</a></li>
                </ul>
            </div>

        </nav>
        <div class="container">

      <form class="form-signin" method="POST" action="valida_login.php">
        <h2 class="form-signin-heading">Faça o login</h2>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" name="inputLogin" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <label for="senha" class="control-label padding-top-10"></label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Senha" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>

      <p class="text-center text-danger">
            <?php
                if (isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                    unset ($_SESSION['loginErro']);
                }  
            ?>
      </p>

    </div> 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>
