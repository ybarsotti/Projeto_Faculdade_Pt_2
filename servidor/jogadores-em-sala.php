<?php 
    if(isset($_REQUEST['room-id']))
    $codsala = $_REQUEST['room-id'];

    $usuariosquery       = "SELECT * FROM user u JOIN ongoing o WHERE (u.userId = o.userId) AND o.roomId = " . $codsala;
    $usuarios            = mysqli_query($con, $usuariosquery);
?>