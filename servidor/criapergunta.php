<?php  
session_start();
//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	
	//Redireciona para a página de autenticação
  echo '<script> window.history.go(-1); </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar Pergunta</title>
</head>
<body>

<?php
/*
 Yuri Barsotti Mendes RA: 21095474 
*/ 
    $userid          = $_SESSION['userId'];
    $pergunta        = $_POST['questao-pergunta'];
    $tempo           = $_POST['tempo'];
    $resposta1       = $_POST['resposta1'];
    $resposta2       = $_POST['resposta2'];
    $resposta3       = $_POST['resposta3'];
    $resposta4       = $_POST['resposta4'];
    $respostacorreta = $_POST['repostacorreta'];
    $idquestionario  = $_GET['id'];

    $host = 'localhost';
    $db = 'id9155796_metodologico';
    $user = 'id9155796_barsotti';
    $pass = 'metodologico';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    $sql = "INSERT INTO `answers`(`question`, `ans1`, `ans2`, `ans3`, `ans4`,`correctans`, `time` ,`userID`, `questionId` ) VALUES ('". $pergunta . "', '" . $resposta1 . "', '" . $resposta2 . "' , '" . $resposta3 . "', '" . $resposta4 . "', " . $respostacorreta . ", " . $tempo . ", " . $userid . ", " . $idquestionario . ")";
    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error($con));
    }

    $insert = mysqli_query($con, $sql) or die('Erro de query: ' . mysqli_error($con));

    if($insert != FALSE){
      echo '<script> alert("Pergunta criada com sucesso !"); window.history.go(-1); </script>';
    }

    mysqli_close($con);




?>

</body>
</html>