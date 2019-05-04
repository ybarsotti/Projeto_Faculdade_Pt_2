<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
</head>
<body>

<?php 

    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpass = $_POST['pass'];

    $host = 'localhost';
    $db = 'metodologico';
    $user = 'root';
    $pass = '';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    $select = "SELECT * FROM `user` WHERE userName = '" . $username . "' or userMail = '" . $email . "'";
    $sql = "INSERT INTO `user`(`userName`, `userPass`, `userMail`) VALUES ('". $username . "' , '" . $userpass . "' , '" . $email . "')";

    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error());
    }

    $select = mysqli_query($con, $select);
    $row = mysqli_fetch_assoc($select);
    if ($row> 0){
      echo 'Usuario ja cadastrado';
    } else{
      mysqli_query($con, $sql);
      echo 'Cadastrado com sucesso';
    }
    mysqli_free_result($select);

    mysqli_close($con);




?>

<script>
  setTimeout(function () {window.history.go(-1);}, 1500);
</script>

</body>
</html>