<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/

    require("conexao.php");
    $resposta = $_POST['resposta'];
    $ans = mysqli_query($con, "SELECT {Pergunta aqui} FROM `answers` WHERE `correctans` = " . $resposta);
    echo $ans;

?>