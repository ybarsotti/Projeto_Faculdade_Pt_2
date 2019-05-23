<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    session_start();

    require("conexao.php");
    $roomid  = $_REQUEST['roomId'];
    $jogador = $_POST['jogador'];

    //Captura o questionario
    $questionario = mysqli_query($con, "SELECT `questionId`, `numPergunta` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $questao = mysqli_fetch_array($questionario);

    // Pega a pergunta
    if($pergunta = mysqli_query($con, "SELECT * FROM `answers` WHERE `questionId` =  " . $questao[0])  or die(mysqli_error($con))){
        $qtePerguntas = mysqli_num_rows($pergunta);

            if($questao[1] < $qtePerguntas){
                mysqli_data_seek($pergunta, $questao[1] - 1);
                $row = mysqli_fetch_array($pergunta);

                echo json_encode($row); 

                mysqli_free_result($pergunta);
        }else{
            $fim = array('question' => "Fim do jogo");
            echo json_encode($fim);
        }

    }

        // Inserir no banco de dados a pergunta atual
        /*
        if($numQuestao = mysqli_query($con, "UPDATE `ongoing` SET `numPergunta` = `numPergunta` + 1 WHERE ( `roomId` = " . $roomid . " AND `userName` = '" . $jogador . "') ") or die(mysqli_error($con))){
            mysqli_close($con);
        }
        */


?>