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
    <title>Apagar Questionario</title>
</head>
<body>

<?php
/*
 Yuri Barsotti Mendes RA: 21095474 
*/ 
    $userid                  = $_SESSION['userId'];
    $idquestionario          = $_GET['id'];

    $host = 'localhost';
    $db = 'id9155796_metodologico';
    $user = 'id9155796_barsotti';
    $pass = 'metodologico';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    $sql = "DELETE FROM `questions` WHERE id = " . $idquestionario . " AND userId = " . $userid ;
    $sql2 = "DELETE FROM `answers` WHERE questionId = " . $idquestionario . " AND userId = " . $userid ;
    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error($con));
    }

    mysqli_query($con, $sql) or die('Erro de query: ' . mysqli_error($con));

    mysqli_query($con, $sql2) or die('Erro de query: ' . mysqli_error($con));

    echo '<script> window.history.go(-1); </script>';

    mysqli_close($con);


?>

</body>
</html>