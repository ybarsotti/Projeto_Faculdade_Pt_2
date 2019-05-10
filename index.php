<?php  session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/main.css">
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

        <!-- Barra de navegacao --> 

    <nav class="container-fluid navbar navbar-expand-lg navbar-fixed-top nav-principal">
        <nav class="container navbar navbar-expand-lg navbar-fixed-top nav-inner">
            <a class="navbar-brand" href="index.php">Metodo<span class="logoV">LÓGICO</span></a>

            <button class="navbar-toggler collapsed navbar-light bg-light hamburg" type="button" data-target="#menubtn" data-toggle="collapse" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menubtn">
                    <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#projeto">O projeto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contato">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cod-jogar" href="jogar.php" target="_blank">Entrar com código !</a>
                            </li>
                    </ul>

                    <!-- Acesso de Login / Cadastro -->
    <?php 
        if(isset($_SESSION['token'])) {
            echo ' <div class="dropdown">
            <button class="botao-perfil" type="button" id="menu-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-cog icone"></i> 
            </button>
            <div class="dropdown-menu opcoes-perfil" aria-labelledby="menu-dropdown">
                <div class="texto-perfil text-center">'. $_SESSION['login'] .'</div>
                <div class="dropdown-divider"></div>';
                if($_SESSION['userType'] == 2){
               echo ' <a class="dropdown-item" href="painel.php"><i class="fas fa-th-list icone"></i> Painel</a> ';
                }
            echo '<a class="dropdown-item" href="editar-perfil.php"><i class="far fa-user"></i> Editar Perfil</a>
                <a class="dropdown-item" href="mudar-senha.php"><i class="fas fa-key"></i> Mudar senha</a>
                <div class="dropdown-divider"></div> 
                <a class="dropdown-item" href="logout.php?token='. $_SESSION['token'] .'"><i class="fas fa-sign-out-alt"></i> Deslogar</a>
            </div>
        </div>';
        }else{
                echo   '<ul class="nav navbar-nav log">
                        <li class="dropdown">
                            <button type="button" id="btnMenu" data-toggle="dropdown" class="btn btn-link dropdown-toggle px-3 btn-login">Fazer Login<span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right mt-2">
                                    <li class="px-3 py-2">
                                        <form class="form" action="logar.php" method="POST">
                                        <div class="form-group">
                                            <input id="usr" name="userName" placeholder="Usuario" class="form-control form-control-sm" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <input id="psw" name="userPass" placeholder="Senha" class="form-control form-control-sm" type="password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block btn-logar" value="Logar">
                                        </div>
                                        <div class="form-group text-center rmbpsw">
                                            <a href="forgot-pass.html">Esqueceu a senha?</a>
                                        </div>
                                        </form>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                   <a href="cadastro.html" target="_blank"><button class="btn btn-primary btn-cadastro px-4 mx-1 newacc">Cadastro</button></a>';
                };
                ?>  
              </div>
        </nav>
    </nav>
         
        <!-- Fim da barra de Navegacao -->

        <!-- Conteudo principal -->
        <div class="container-fluid">
            <!--Linha 1-->
            <div class="row position-relative justify-content-end fila1 mb-4" id="fila">

                <div class="col col-lg-4 col-md-4 col-sm-4 border my-auto fundo"> </div>

                <div class="col col-lg-4 col-md-4 col-sm-5 my-auto texto-apresentacao">
                        <h1>Aprendizado sem tédio !</h1> 
                         <h4>Criando jogos para aprendizado em minutos.</h4>
                         <a href="cadastro.html"><button class="btn btn-lg btn-cadastro border mt-1 cad">Cadastre-se</button></a>
                </div>

            </div>

        <!-- Fim da Linha 1--> 

        <!-- Inicio da Linha 2-->

        <div class="row projeto-container align-content-center" id="projeto">

            <div class="col col-lg-10 mx-auto text-center projeto-inner">
                <h1 class="mb-3">O projeto</h1>
                <h4>Nasceu como um projeto da Universidade Anhembi Morumbi, desenvolvido pelo grupo {H}.</h4>
            </div>

        </div>


        <!-- Fim da Linha 2-->

        <!-- Inicio do footer-->
        <footer class="row" id="contato"> 
            <div class="col col-12 social text-center">
                <a href="#" class="links px-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="links px-2"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="links px-2"><i class="fab fa-youtube"></i></a>
            </div>
            <div class="col col-12 mt-2 fab text-center">© 2019 MetodoLOGICO, Todos os direitos reservados</div>
        </footer>
        <!-- Fim do footer-->
        </div>
        <!-- Fim do conteudo principal-->

        <script src="_js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>