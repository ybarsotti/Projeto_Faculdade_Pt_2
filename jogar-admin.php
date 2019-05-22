<?php  
session_start();
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
    //Caso o usuário não esteja autenticado, limpa os dados e redireciona
    if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
        //Destrói
        session_destroy();

        //Limpa
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        
        //Redireciona para a página de autenticação
    echo '<script> window.history.go(-1); </script>';
    }

    $idquestionario = $_GET['id'];
    $codsala        = $_GET['codsala'];

    require_once('servidor/conexao.php');

    // pega quantidade de perguntas que o usuario tem
    $quantidade       = "SELECT COUNT(*) FROM `answers` WHERE userId = " . $_SESSION['userId'] . " AND questionId = " . $idquestionario ;
    $quantidadeselect = mysqli_query($con, $quantidade) or die('Erro de query: ' . mysqli_error());
    $quantidadeselect = mysqli_fetch_array($quantidadeselect);

    //Pega a pergunta
    $sql      = "SELECT `question` FROM `answers` WHERE userId = " . $_SESSION['userId'] . " AND questionId = " . $idquestionario ;
    $pergunta = mysqli_query($con, $sql) or die('Erro de query: ' . mysqli_error($con));
    $pergunta = mysqli_fetch_assoc($pergunta);

    //Valida se o jogo comecou
    //require("servidor/inicia-jogo.php");
   
    //Limita acesso de aluno
    require('servidor/limitar-acesso.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jogar Admin - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/jogar-admin.css">
    <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="https://img.icons8.com/metro/26/000000/dice.png" />
</head>
<body>

        <form id="room">           
            <?php echo '<input type="hidden" name="room-id" id="room-id" value="' . $codsala . '"> ';?>
        </form>

<noscript>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ah não!</h4>
        <p>Seu Javascript está desabilitado.</p>
        <hr>
        <p class="mb-0"><a href="https://www.hostnet.com.br/info/ativar-o-javascript-no-navegador/"><span style="color: green; "><strong>Habilite</strong></span></a> seu javascritp para visualizar o conteúdo do site sem erros.</p>
    </div>
</noscript>

<nav class="navbar navbar-expand">
    <?php echo 'Cod: ' . $codsala; 
        
          echo '<button class="btn" id="iniciar" onclick="iniciar('.$codsala.')">Iniciar partida</button>';
    
    ?>

        
</nav>



    <!-- Form de edicao -->
    <div class="container-fluid">
        <div class="row">
            
            <div class="col text-center">
                <div class="pergunta">

                </div>

                <hr>

                <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3">
                    <div class="temporizador text-center">
                        <div class="tempo mx-auto">
                            <span id="temporizador"></span>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>

        <div class="row">
            
           <div class="col-8">
              <!--  <img class="img-fluid" src="./_img/tabuleiro.jpeg" alt=""> -->  
            </div>
            
            <div class="col users">
                <table class="usuarios">
                </table>
            </div>

        </div> 
    </div>


        <script src="_js/jogar-admin.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>