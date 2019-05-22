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
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpass = $_POST['pass'];
    $usertype = $_POST['tipo'];

    if (isset($_POST['g-recaptcha-response'])) {
      $captcha_data = $_POST['g-recaptcha-response'];
  }
  
  // Se nenhum valor foi recebido, o usuário não realizou o captcha
  if (!$captcha_data) {
      echo "Por favor, confirme o captcha.";
      echo "<script> setTimeout(function(){window.history.go(-1); }, 1500) </script>";
      exit;
  }

  $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdZ9KQUAAAAAPgYznMwy-LxGZW8iUBh73GDbCvw&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);

  if ($resposta) {
    $host = 'localhost';
    $db = 'id9155796_metodologico';
    $user = 'id9155796_barsotti';
    $pass = 'metodologico';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    $select = "SELECT * FROM `user` WHERE userName = '" . $username . "' or userMail = '" . $email . "'";
    $sql = "INSERT INTO `user`(`userName`, `userPass`, `userMail`, `userType`) VALUES ('". $username . "', '" . $userpass . "' , '" . $email . "', " . $usertype . "  )";

    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error());
    }

    $select = mysqli_query($con, $select) or die('Erro de query: ' . mysqli_error());
    $row = mysqli_fetch_assoc($select);
    if ($row > 0){
      echo 'Usuario ja cadastrado';
      } else{
        $resposta = mysqli_query($con, $sql);
        if(!$resposta){
          echo 'Falha ao cadastrar ' . mysqli_error($con);
        } else{
          echo 'Cadastrado';
          echo "<script> setTimeout(function () { window.location.href='../index.php' }, 1500 ); </script>";
      }
    }
    mysqli_free_result($select);

    mysqli_close($con);

} else {
    echo "Erro no REcaptcha";
    echo '<script> window.location.href="cadastro.html" </script>';
    exit;
}



?>


</body>
</html>