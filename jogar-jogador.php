<?php 
    session_start();
    require("servidor/conexao.php");

    $codigosala = $_POST['codigo'];

    if(isset($_POST['nickname'])){
        $nickname = $_POST['nickname'];
    }

    //Query para verificar se a sala existe
    $sql = "SELECT `roomId` from `ongoing` WHERE `roomId` = " . $codigosala;
    $res = mysqli_query($con, $sql);
    $res = mysqli_fetch_array($res);

    if($codigosala == '' or $codigosala != $res[0]){
        echo "<script> alert('Sala nao encontrada!'); window.location.href='jogar.php'; </script>";
    }

    //Query para inserir o jogador na sala (Nao cadastrado)
    if(isset($nickname)){
    $sql2 = "INSERT INTO `ongoing` (`roomId`, `userName`) VALUES (" . $res[0] . ", '" . $nickname . "')";
    mysqli_query($con, $sql2) or die("Erro sem query (NN): " . mysqli_error($con));
}

    //Query para inserir o jogador na sala (cadastrado)
    if(isset($_SESSION['userId'])){
        $sql2 = "INSERT INTO `ongoing`(`roomId`,`userId`,`userName`) VALUES (" . $res[0] . ", " . $_SESSION['userId'] . ", '" . $_SESSION['login'] ."')";
        mysqli_query($con, $sql2) or die("Erro sem query (CN): " . mysqli_error($con));
    }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jogar - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/jogar-jogador.css">
    <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="https://img.icons8.com/metro/26/000000/dice.png" />
</head>
<body <?php echo 'onload="verificaPartida('. $codigosala .')";'; ?>>

<noscript>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ah não!</h4>
        <p>Seu Javascript está desabilitado.</p>
        <hr>
        <p class="mb-0"><a href="https://www.hostnet.com.br/info/ativar-o-javascript-no-navegador/"><span style="color: green; "><strong>Habilite</strong></span></a> seu javascritp para visualizar o conteúdo do site sem erros.</p>
    </div>
</noscript>

    <!-- Navegacao -->

    <nav class="navbar navbar-expand">
            <p id="codigo"> <?php echo 'Cod: ' . $codigosala ; ?> </p>
            <form action="servidor/sair-sala.php" method="post" name="saida" class="mb-4"> 
            <?php 
            $botao = isset($_POST['nickname']) ? '<button class="btn" onclick="sair()" name="user" value="\''.$nickname.'\'">Sair</button>' : ' <button class="btn" onclick="sair()" name="user" value="'.$_SESSION['login'].'">Sair</button> ' ;
            echo $botao;
            ?>
            <form>
    </nav>
        

    <!-- Fim da navegacao-->

    <!-- Form de edicao -->
    <div class="container-fluid">

        <div class="row">

            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                <div class="questao text-center mx-auto">
                    
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                <div class="temporizador text-center">
                    <div class="tempo mx-auto">
                        <span id="temporizador" onclick="timer()"></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row container fixed-bottom">
        <form action="">
            <div class="row mt-5 row-respostas">

                <input type="radio" name="resposta" id="resposta-1">
                
                        <label for='resposta-1' class="col col-lg-6 col-md-6 col-sm-6 col-resposta col-resposta-1"> 
                            <div class="resposta div-resposta-1" onclick="">

                            </div>
                        </label>
                
                <input type="radio" name="resposta" id="resposta-2">

                        <label for='resposta-2' class="col col-lg-6 col-md-6 col-sm-6 col-resposta col-resposta-2">
                            <div class="resposta div-resposta-2" onclick=''>
                            
                            </div> 
                        </label>

            </div>

            <div class="row row-respostas">

                    <input type="radio" name="resposta" id="resposta-3">
                         
                            <label for='resposta-3' class="col col-lg-6 col-md-6 col-sm-6 col-resposta col-resposta-3"> 
                                <div class="resposta div-resposta-3" onclick="">
                                
                                </div>
                            </label>
                        
                        <input type="radio" name="resposta" id="resposta-4">
                  
                        <label for='resposta-4' class="col col-lg-6 col-md-6 col-sm-6 col-resposta col-resposta-4"> 
                            <div class="resposta div-resposta-4" onclick="">
                            
                            </div> 
                        </label>
              
                </div>
        </form>
    </div>
    </div>

        <script src="_js/jogar-jogador.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>