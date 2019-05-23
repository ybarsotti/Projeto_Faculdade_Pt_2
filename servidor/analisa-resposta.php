<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/

    require("conexao.php");

    $resposta = $_POST['resposta'];
    $roomid   = $_POST['idsala'];
    $nick     = $_POST['jogador'];

    //Captura o questionario
    $questionario = mysqli_query($con, "SELECT `questionId` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $questao = mysqli_fetch_array($questionario);

    // Pega a resposta correta da pergunta
    if($pergunta = mysqli_query($con, "SELECT * FROM `answers` WHERE `questionId` =  " . $questao[0])  or die(mysqli_error($con))){

        $numeroPergunta = "SELECT `numPergunta` FROM `ongoing` WHERE `roomId` = " . $roomid ;
        $numeroPergunta = mysqli_query($con, $numeroPergunta);
        $numeroPerg     = mysqli_fetch_array($numeroPergunta);

                mysqli_data_seek($pergunta, $numeroPerg[0] - 1);
                $row = mysqli_fetch_array($pergunta);

                if($resposta == $row['correctans']){

                    echo "Resposta Correta!";
                    $sql = "UPDATE `ongoing` SET `pontos` =  `pontos` + 1 WHERE ( `roomId` = " . $roomid . " AND `userName` = '" . $nick . "' )";
                    mysqli_query($con, $sql) or die(mysqli_error($con));

                }else{

                    echo "Resposta Errada!";
                    
                }

    }

    mysqli_close($con);

?>