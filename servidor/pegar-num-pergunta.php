<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    session_start();

    require("conexao.php");

    $roomid  = $_POST['roomId'];
    $usuario = $_POST['usuario'];

    //Captura o questionario
    
    /*
    $questionario = mysqli_query($con, "SELECT `questionId` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $questao = mysqli_fetch_array($questionario);
    */

    //Pega o numero da pergunta atual do questionario
    $numQuestaoAtual = mysqli_query($con, "SELECT `numPergunta` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $numeroAtual = mysqli_fetch_array($numQuestaoAtual);

    // Pega o numero da pergunta do usuario
    $numQuestao = mysqli_query($con, "SELECT `numPergunta` FROM `ongoing` WHERE ( `roomId` = " . $roomid . " AND `userName` = ' " . $usuario . " ' )") or die(mysqli_error($con));
    $numero = mysqli_fetch_array($numQuestao);

    mysqli_close($con);

    if($numeroAtual[0] != $numero[0]){
        $query = mysqli_query($con, "UPDATE `ongoing` SET `numPergunta` = " . $numeroAtual . " WHERE `userName` = '" . $usuario . "' ");
        //echo $query;
    }else{
        echo 0;
    }
    
?>