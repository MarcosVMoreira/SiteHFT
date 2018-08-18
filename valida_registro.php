    <?php
        session_start();
        
        include_once("conexao.php");

        $primeiroNome = $_POST["firstName"];
        $ultimoNome = $_POST["lastName"];
        
        $concat = $primeiroNome."_".$ultimoNome;
        echo $concat;
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $email = $_POST["email"];
        
        $query = "INSERT INTO tabela_usuarios(usu_nome, usu_login, 
        usu_password, usu_email, usu_nivelAcesso) VALUES ('$concat', '$login', MD5('$senha'), '$email', '0')";


        if ($conexao->query($query) === TRUE) {
           header ("Location: registration_confirm.php");
           echo ("inseri");
        } else {
           echo "Error: " . $query . "<br>" . $conexao->error;
        }

        
    ?>