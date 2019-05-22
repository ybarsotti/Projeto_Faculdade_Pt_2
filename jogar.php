<?php  session_start(); 
/*
 Yuri Barsotti Mendes RA: 21095474 
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jogar - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/jogar.css">
    <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="https://img.icons8.com/metro/26/000000/dice.png" />
</head>
<body>

<noscript>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ah não!</h4>
        <p>Seu Javascript está desabilitado.</p>
        <hr>
        <p class="mb-0"><a href="https://www.hostnet.com.br/info/ativar-o-javascript-no-navegador/"><span style="color: green; "><strong>Habilite</strong></span></a> seu javascritp para visualizar o conteúdo do site sem erros.</p>
    </div>
</noscript>

        <!-- Senha de acesso -->
        <div class="container-fluid principal">

            <div class="row align-items-center vh-90">
                <div class="col col-lg-4 mx-auto mt-auto caixa-form">
                    <div class="form-group">

                        <form action="jogar-jogador.php" method="POST" class="envio-jogar">

                            <h2 class="text-center">Insira o código da sala</h2>
                            <div id="nickinput"></div>
                            <input type="text" name="codigo" id="codigo" placeholder='Código' class="form-control mb-1">

                            <?php 

                                if(isset($_SESSION['userId'])){
                                    echo '<input type="hidden" name="userid" id="userid" value="'. $_SESSION['userId'] .'">';
                                }

                            ?>

                            <button type="button" class="form-control botao" onclick="validar()">Entrar</button>

                        </form>

                    </div>
                </div>
            </div>
        <!-- Fim da senha de acesso -->    

        <div class="h-100"></div>
        <!-- Inicio do footer-->
        <footer class="row vh-10 direitos" id="contato"> 
            <div class="col col-12 mt-2 fab text-center">© 2019 MetodoLOGICO, Todos os direitos reservados</div>
        </footer>
        <!-- Fim do footer-->
        </div>

        <script src="_js/jogar.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>