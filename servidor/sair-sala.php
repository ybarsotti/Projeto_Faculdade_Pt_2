<?php 
  require_once('conexao.php');

  $user = $_GET['userid'];

  $sql = "DELETE FROM `ongoing` WHERE userId = " . $user;

  $query = mysqli_query($con, $sql) or die('Erro na query:' . mysqli_error($con));

  mysqli_close($con);

?>