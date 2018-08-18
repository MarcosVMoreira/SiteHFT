<?php
    session_start();
    include_once("conexao.php");
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sobreSimulador.php">Sobre o simulador</a></li>
                    <li class="active"><a href="simular.php">Simular</a></li>
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
        <form method="post" action="recebe_upload.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div>
                    <?php
                    if ((isset($_SESSION['usuarioNivelAcesso']) && ($_SESSION['usuarioNivelAcesso'] == "0"))) {
                        echo '<h2 class="text-uppercase">Utilize nosso simulador</h2>
                        <p>Para ter acesso ao nosso simulador, você precisa ter nivelAcesso 1 ou 2. 
                            Voce tem nivelAcesso 0. </p>';
                    } else if (isset($_SESSION['usuarioNivelAcesso']) && (($_SESSION['usuarioNivelAcesso'] == "1")
                    || ($_SESSION['usuarioNivelAcesso'] == "2"))) {
                        $id = $_SESSION['usuarioId'];
                        $query = "SELECT * FROM tabela_logarquivos WHERE log_idUsuario='$id'";
                        $result = $conexao->query($query);

                        echo '<h2 class="text-uppercase">Bem vindo ao simulador</h2>
                        <p>Para utilizar nosso simulador, envie um arquivo do tipo texto com código em Java
                        com tais parâmetros que estamos definindo. Para enviar, utilize o botão abaixo. Falta
                         coisa nessa página.<BR>Primeiro parâmetro: o arquivo .class não pode pertencer a um pacote. Retire a notação package
                         do código.<BR></p><BR><input type="file" name="arquivo" class=""/><BR>
                         <button class="btn btn-primary " type="submit">Enviar</button><BR><BR>
                         <div class="table-responsive">
                         <h4 class="text-uppercase">Resultados de processamentos anteriores:</h4>
                         <table class="table table-striped table-bordered table-hover table-condensed">
                             <thead>
                                 <tr>
                                     <th>Arquivo</th>
                                     <th>Horário</th>
                                     <th>Resultado</th>
                                 </tr>
                             </thead>
                             <tbody>';

                             while ($linha = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>'.$linha['log_nomeArquivo'].'</td>';
                                echo '<td>'.$linha['log_horario'].'</td>';
                                echo '<td>'.$linha['log_resultado'].'</td>';
                                echo '</tr>';

                            }                             
                            echo '
                             </tbody>
                         </table>
                          </div>';
                    } else {
                        echo '<h2 class="text-uppercase">Utilize nosso simulador</h2>
                        <p>Nosso simulador conta com a tecnologia ultra power hyper mega 6000. Para ter acesso
                         a ele, crie uma conta e realize o login. </p>';
                    }

                    ?>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>
