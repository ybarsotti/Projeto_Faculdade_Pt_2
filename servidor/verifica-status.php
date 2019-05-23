<?php
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    require("conexao.php");
    
    $codigosala = $_POST['codsala'];
    $sql = mysqli_query($con, "SELECT `status` FROM `ongoing` WHERE `roomId` = " . $codigosala ) or die(mysqli_error($con));
    $query = mysqli_fetch_array($sql);
    echo $query[0];

?>