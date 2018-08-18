<?php
    session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>HFT System</title>
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

    </head>
    <body>
        <nav class="navbar navbar-default navbar-hft">
            <div class="container">
                <div class="navbar-header"> 
                    <!-- colocar um logo melhor aqui-->
                    <a href="index.php" class="navbar-brand"><img id="navbar-brand-hftLogo" src="img/logo.png"></a>

                    <button class="navbar-toggle glyphicon glyphicon-menu-hamburger"
                            data-toggle="collapse" data-target="#navbar-hftsystem"></button>
                    
                </div>

                <ul id="navbar-hftsystem" class="nav navbar-nav navbar-right collapse navbar-collapse">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="sobreSimulador.php">Sobre o simulador</a></li>
                    <li><a href="simular.php">Simular</a></li>
                    <li><a href="contato.php">Contato</a></li>
                    <?php
                    if ((isset($_SESSION['usuarioId']) && ($_SESSION['usuarioId'] != "")) && 
                    (isset($_SESSION['usuarioNome']) && ($_SESSION['usuarioNome'] != "")) &&
                    (isset($_SESSION['usuarioLogin']) && ($_SESSION['usuarioLogin'] != "")) &&
                    (isset($_SESSION['usuarioSenha']) && ($_SESSION['usuarioSenha'] != "")) &&
                    (isset($_SESSION['usuarioEmail']) && ($_SESSION['usuarioEmail'] != "")) &&
                    (isset($_SESSION['usuarioNivelAcesso']) && ($_SESSION['usuarioNivelAcesso'] != ""))) {
                        echo '<li><a href="welcome.php"><u>'.$_SESSION['usuarioNome'].'</u></a></li><li><a href="sair.php">Sair</a></li>';
                    } else {
                        echo '<li><a href="registration.html">Registrar</a></li>
                        <li>
                        <a href="login.php">Login</a></button>
                        </li>';
                    }
                        
                    ?>
                </ul>
            </div>

        </nav>


        <div class="container">
            <div class="row">
                <div>
                    <h2 class="text-uppercase">Conheça nosso sistema</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non pretium elit, a vulputate nisl. Donec aliquet est quis fermentum dignissim. Vestibulum blandit eros mauris, non dignissim velit dictum elementum. Etiam mollis mauris in arcu placerat tincidunt. Nulla a leo id arcu aliquet volutpat non vitae ex. </p>
                   
                </div>
            </div>

        </div>

    </body>
</html>
