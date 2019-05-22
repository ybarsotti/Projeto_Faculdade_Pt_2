<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    session_start();
    $idquestionario = $_GET['id'];

    //Gerar o numero da sala
    $codsala = rand(1000, 10000);
    //Grava no banco a sala em andamento no momento
    require_once('conexao.php');

    $sql = "INSERT INTO ongoing(`roomId`,`userId`,`userName`, `questionId`, `status`) VALUES(" . $codsala . "," . $_SESSION['userId'] . ", '" . $_SESSION['login'] . "' , " . $idquestionario . " , " . 0 .")";

    mysqli_query($con, $sql) or die('Erro de query: ' . mysqli_error($con));
    mysqli_close($con);


    echo '<script> window.location.href="../jogar-admin.php?id='.$idquestionario.'&codsala='. $codsala .'" </script>';

?>