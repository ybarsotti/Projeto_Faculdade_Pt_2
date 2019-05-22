<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    session_start();

    if(!isset($_SESSION['numQuestao'])){
        $_SESSION['numQuestao'] = 0;
    }

    require("conexao.php");
    $roomid = $_REQUEST['roomId'];

    //Captura o questionario
    $questionario = mysqli_query($con, "SELECT `questionId` FROM `ongoing` WHERE `roomId` = " . $roomid) or die(mysqli_error($con));
    $questao = mysqli_fetch_array($questionario);

    // Pega a pergunta
    if($pergunta = mysqli_query($con, "SELECT * FROM `answers` WHERE `questionId` =  " . $questao[0])  or die(mysqli_error($con))){
        $qtePerguntas = mysqli_num_rows($pergunta);

            if($_SESSION['numQuestao'] < $qtePerguntas){
                mysqli_data_seek($pergunta, $_SESSION['numQuestao']);
                $row = mysqli_fetch_array($pergunta);

                echo json_encode($row); 

                mysqli_free_result($pergunta);
        }else{
            $fim = array('question' => "Fim do jogo");
            echo json_encode($fim);
        }

    }
            
    // Inserir no banco de dados a pergunta atual
    if($numQuestao = mysqli_query($con, "UPDATE `ongoing` SET `numPergunta` = " . $_SESSION['numQuestao'] . " WHERE `roomId` = " . $roomid) or die(mysqli_error($con))){
        $_SESSION['numQuestao'] += 1;
        mysqli_close($con);
    }
    

    
?>