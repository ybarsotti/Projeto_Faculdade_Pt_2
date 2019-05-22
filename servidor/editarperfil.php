<?php  
session_start();
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
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
    <title>Profile</title>
</head>
<body>
    
    <?php

        $novousuario = $_POST['usrname'];
        $novoemail = $_POST['email'];

        $host = 'localhost';
        $db = 'id9155796_metodologico';
        $user = 'id9155796_barsotti';
        $pass = 'metodologico';

        $con = mysqli_connect($host, $user, $pass, $db) or die('Erro com a conexao com o banco !' . mysqli_error());

        $sql = "SELECT COUNT(*) FROM `user` WHERE userName = '$novousuario' or userMail = '$novoemail' " ;

        $result = mysqli_query($con, $sql) or die('Erro na selecao da tabela ! : ' . mysqli_error($con));
        
        $qte = mysqli_fetch_array($result);

        if($qte[0] > 0){
            echo '<script> alert("Usuario ou email ja esta sendo utilizado");
            window.history.go(-1); </script>';
        }else{

        if($novousuario != '' and $novoemail == ''){
            $update = "UPDATE `user` SET userName = '$novousuario' WHERE userName = '" . $_SESSION['login'] . "'";
            $resultado = mysqli_query($con, $update) or die('Falha usuario: ' . mysqli_error($con));
            if($resultado != FALSE){
                $_SESSION['login'] = $novousuario;
                echo '<script> alert("Usuario alterado com sucesso");
                window.history.go(-1); </script>';
            }

        } 

        if($novousuario == '' and $novoemail != ''){
            $update = "UPDATE `user` SET userMail = '$novoemail' WHERE userName = " . $_SESSION['login'] . "'";
            $resultado = mysqli_query($con, $update) or die('Falha email: ' . mysqli_error($con));
            if($resultado != FALSE){
                echo '<script> alert("E-mail alterado com sucesso");
                window.history.go(-1); </script>';
            }
        }

        if($novousuario != '' and $novoemail != ''){
            $update = "UPDATE `user` SET userMail = '$novoemail' , userName = '$novousuario' WHERE userName = '" . $_SESSION['login'] ."'"  ;
            $resultado = mysqli_query($con, $update) or die('Falha user/mail: ' . mysqli_error($con));
            if($resultado != FALSE){
                $_SESSION['login'] = $novousuario;
                echo '<script> alert("Usuario e E-mail alterado com sucesso");
                window.history.go(-1); </script>';
            }
        }

    }

    mysqli_close($con);
    ?>  

</body>
</html>