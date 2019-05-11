<?php 
  require_once('conexao.php');

    $user = $_POST['user'];

    $sql = "DELETE FROM `ongoing` WHERE `userName` like '" . $user . "'";
    $query = mysqli_query($con, $sql) or die('Erro na query:' . mysqli_error($con));
    mysqli_close($con);
    
  echo '<script> window.location.href="index.php";</script>';

  
?>