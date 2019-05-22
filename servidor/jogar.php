<?php 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
require("conexao.php");

    class Query{
        
        public $sql;

        function setSql($sql){
            $this->sql = $sql;
        }

        function getSql(){
            return $this->sql;
        }


        function verificarSala($query){
            $sql = "SELECT `roomId` FROM `ongoing` WHERE `roomId` = ?";
            $stm = mysqli_prepare($con, $sql);
            $stm->bind_param("s", $query->getSql());
            $resp = $stm->execute();
            mysqli_close($con);
            return $resp;
        }
    }



?>