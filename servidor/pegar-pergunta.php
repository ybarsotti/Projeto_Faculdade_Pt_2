<?php 
    require("conexao.php");
    $roomid = $_REQUEST['roomId'];
    //Captura o questionario
    $questionario = mysqli_query($con, "SELECT `questionId` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $questao = mysqli_fetch_array($questionario);
    //echo $questao[0];

    // Pega a pergunta
    $pergunta = mysqli_query($con, "SELECT * FROM `answers` WHERE `questionId` =  " . $questao[0])  or die(mysqli_error($con));
    $res = mysqli_fetch_array($pergunta);
    echo json_encode($res);


?>