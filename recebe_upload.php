<?php

session_start();
include_once("conexao.php");

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('java');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .java e um nome único)
$_UP['renomeia'] = true;


$id = "SELECT * FROM tabela_logarquivos ORDER BY log_id DESC LIMIT 1";




$result = $conexao->query($id);

$resultado = $result->fetch_assoc();

if (empty($resultado["log_id"])) {
  $idArquivo = 0;
} else {
  $idArquivo = $resultado["log_id"];
}





$tempo = date('Y-m-d-H:i:s');

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
  die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
  exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$exp = explode('.', $_FILES['arquivo']['name']);
$extensao = strtolower(end($exp));

if (array_search($extensao, $_UP['extensoes']) === false) {
  echo "Por favor, envie arquivos com a extensão '.java'.";
  exit;
}

// Faz a verificação do tamanho do arquivo
if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
  echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
  exit;
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta

// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
  // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
  $nome_final_sem_java=$_SESSION['usuarioNome'].$idArquivo;
  $nome_final = $_SESSION['usuarioNome'].$idArquivo.'.java';

} else {
  // Mantém o nome original do arquivo
  $nome_final = $_FILES['arquivo']['name'];
}
  
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo


 // echo '<a href="' . $_UP['pasta'] . $nome_final . '"> Clique aqui para acessar o arquivo</a>';
  $idUsuario = $_SESSION['usuarioId'];



  //$nome_final é o nome final do arquivo, que será salvo
  //dar exec aqui no CompiladorDeJava e, se o resultado for que não deu problema, chamar a query de inserir
  //na filaProcessamento
  //sleep(2);

  echo exec('java /k -jar C:\wamp64\www\SiteHFT\CompiladorDeJava.jar '.$nome_final_sem_java, $output, $retorno);

  if ($retorno !== 0) { //PELO QUE EU PESQUISEI, O OUTPUT RETORNA O LOG QUE O PROGRAMA PRINTA E 
    //O RETORNO RETORNA 0 OU 1, 0 SE DEU CERTO E 1 SE DEU ERRADO RODAR O PROGRAMA
    echo "Existe um erro no seu código. Possíveis erros: <BR>";
    echo "- Verifique se, no seu código, o nome da classe é a mesma do nome do arquivo (".$nome_final_sem_java."). Caso não seja, favor alterar para este nome.<BR>";
    echo "- Verifique a sintaxe do seu código.<BR>";
    echo "Log de erros: <BR>";
    print_r($output); //NÃO TA PRINTANDO O ERRO POR NADA
    print_r($retorno);
  } else {

  //AQUI EU ADICIONO O ARQUIVO NA FILA DO BD PARA SER PROCESSADO FUTURAMENTE
  $query = "INSERT INTO tabela_logarquivos(log_idUsuario, log_horario, log_nomeArquivo, log_resultado)
  VALUES ('$idUsuario','$tempo', '$nome_final', 'Processando')"; 


  $conexao->query($query);

  $query = "INSERT INTO tabela_filaprocessamento(fila_nomeArquivo, fila_idUsuario)
  VALUES ('$nome_final', '$idUsuario')"; 

  $conexao->query($query);
    
  }




} else {
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  echo "Não foi possível enviar o arquivo, tente novamente";
}

function execInBackground($cmd) { //FUNÇÃO PARA RODAR O EXEC SEM FAZER O PHP TRAVAR E ESPERAR RETORNO. ENTRETANTO, ISSO IRIA DEIXAR O SERVIDOR SOBRECARREGADO.
  //TRABALHAR COM FILA É MELHOR
  if (substr(php_uname(), 0, 7) == "Windows"){
      pclose(popen("start /B ". $cmd, "r")); 
  }
  else {
      exec($cmd . " > /dev/null &");  
  }
}


?>

