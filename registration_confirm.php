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

                    <button class="navbar-toggle glyphicon glyphicon-menu-hamburger" data-toggle="collapse" data-target="#navbar-hftsystem"></button>

                </div>

                <ul id="navbar-hftsystem" class="nav navbar-nav navbar-right collapse navbar-collapse">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sobreSimulador.php">Sobre o simulador</a></li>
                    <li><a href="simular.php">Simular</a></li>
                    <li><a href="contato.php">Contato</a></li>
                    <li class="active"><a href="registration.html">Registrar</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>

        </nav>


        <div class="container padding-top-10">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h3 class="text-uppercase">Obrigado por se registrar!</h3>
                    <p class="padding-top-10">Seu registro está quase pronto.</p>
                    <p>Em instantes, um email de confirmação será enviado para o endereço de email utilizado para cadastro.</p>
                    <p>Caso não receba o email, clique <a>aqui</a> para reenviar.</p>

                    <!-- FAZER FUTURAMENTE FUNÇÃO DE CONFIRMAÇÃO DE CADASTRO POR EMAIL -->

                    <p><a href="index.php"> Ir para a página inicial.</a></p>
                </div>


            </div>

        </div>




</body>

</html>