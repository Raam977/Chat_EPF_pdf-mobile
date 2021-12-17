<?php

session_start();
if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id =  $_POST['incoming_id'];

      
        
$pathToSave = "anexos/$outgoing_id/$incoming_id/";
/*Checa se a pasta existe - caso negativo ele cria*/
if (!file_exists($pathToSave)) {
    mkdir($pathToSave);
}

if ($_FILES) { // Verificando se existe o envio de arquivos.

    if ($_FILES['txtArquivo']) { // Verifica se o campo não está vazio.
        $dir = $pathToSave; // Diretório que vai receber o arquivo.
        $tmpName = $_FILES['txtArquivo']['tmp_name']; // Recebe o arquivo temporário.

        $name = $_FILES['txtArquivo']['name']; // Recebe o nome do arquivo.
        preg_match_all('/\.[a-zA-Z0-9]+/', $name, $extensao);
        if (!in_array(strtolower(current(end($extensao))), array('.txt', '.pdf', '.doc', '.xls', '.xlms'))) {
            echo('Permitido apenas arquivos doc,xls,pdf e txt.');
            header("location: ../chat.php");
            die;
        }
        $result = mysqli_connect($hostname, $username, $password) or die("Erro de ligacao ao servidor: " . mysqli_error());
        mysqli_select_db($result, $dbname) or die ("Erro, nao ligou a base de dados: " . mysqli_error());
        mysqli_query($result, "INSERT INTO messages(myfile) VALUES('$dir')") or die("Item nao inserido" . mysqli_error());
        // move_uploaded_file( $arqTemporário, $nomeDoArquivo )
        if (move_uploaded_file($tmpName, $dir.$name)) { // move_uploaded_file irá realizar o envio do arquivo.        
            echo('Arquivo adicionado com sucesso.');
        } else {
            echo('Erro ao adicionar arquivo.');
        }    
    }  
}
    }
?>
