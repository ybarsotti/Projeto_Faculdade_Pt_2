<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

  
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
      header('location:login.php');
  }

  $novasenha = $_POST['psw'];

  $host = 'localhost';
  $db = 'metodologico';
  $user = 'root';
  $pass = '';

  $con = mysqli_connect($host, $user, $pass, $db) or die('Erro com a conexao com o banco !' . mysqli_error());

      $update = "UPDATE `user` SET userPass = '$novasenha' WHERE userName = '" . $_SESSION['login'] . "'";
      $resultado = mysqli_query($con, $update) or die('Falha usuario: ' . mysqli_error($con));


      if($resultado != FALSE){
          echo '<script> alert("Senha alterada com sucesso");
          window.history.go(-1); </script>';
      }





mysqli_close($con);
?>  

</body>
</html>