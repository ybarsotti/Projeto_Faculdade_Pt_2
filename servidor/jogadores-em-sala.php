<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    if(isset($_POST['roomid'])){
    $codsala = $_POST['roomid'];
    }
    require("conexao.php");

    $usuariosquery       = "SELECT * FROM ongoing WHERE roomId = " . $codsala;
    $usuarios            = mysqli_query($con, $usuariosquery);
    while($res = mysqli_fetch_assoc($usuarios)){
        $vetor[] = array_map('utf8_encode', $res);
    }
    echo json_encode($vetor);

?>