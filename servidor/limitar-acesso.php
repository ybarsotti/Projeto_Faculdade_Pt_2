<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
  //Limita acesso de aluno
  if($_SESSION['userType'] != 2){
     echo '<script> alert("Acesso somente para professores");
     window.location.href="index.php"; </script>';
    }
?>