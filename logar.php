<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php
        
        $login = $_POST['userName'];
        $senha = $_POST['userPass'];

        $host = 'localhost';
        $db = 'id9155796_metodologico';
        $user = 'id9155796_barsotti';
        $pass = 'metodologico';

        $con = mysqli_connect($host, $user, $pass, $db) or die('Erro com a conexao com o banco !' . mysqli_error());

        $sql = "SELECT COUNT(*) FROM `user` WHERE userName = '$login' AND userPass = '$senha'";

        $result = mysqli_query($con, $sql) or die('Erro na selecao da tabela ! : ' . mysqli_error($con));

        $nota = 'Usuario ou senha incorretos';

        $qte = mysqli_fetch_array($result);
        if ($qte[0] != 0){
            if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                $_SESSION['token'] = md5(session_id());
                //$_SESSION['logado'] = TRUE;
                header('location: index.php');
                exit();
            }else{
                session_destroy();
            }
              
        }
        else {
            header('location: index.php');
            exit();
        }

        mysqli_close($con);
    ?>
</body>
</html>