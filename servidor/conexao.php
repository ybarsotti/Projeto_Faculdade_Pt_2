<?php 
    $host = 'localhost';
    $db = 'id9155796_metodologico';
    $user = 'id9155796_barsotti';
    $pass = 'metodologico';
    
    $con = mysqli_connect($host, $user, $pass, $db);
    
    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error($con));
    }


?>