<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    require("conexao.php");
    $codigosala = $_POST['codsala'];
    $sql = mysqli_query($con, "UPDATE `ongoing` SET `status` = 1 WHERE `roomId` = " . $codigosala ) or die(mysqli_error($con));

    echo $sql;
    
    
        
?>