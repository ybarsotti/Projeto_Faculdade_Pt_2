<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Perfil - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/editar-perfil.css">
    <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="https://img.icons8.com/metro/26/000000/dice.png" />
</head>
<body>
<?php 
    session_start();
    if ( !isset($_SESSION['login']) and !isset($_SESSION['senha']) ) {
        //Destrói
        session_destroy();
  
        //Limpa
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        
        //Redireciona para a página de autenticação
        header('location:login.php');
    }
?>
<noscript>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Ah não!</h4>
        <p>Seu Javascript está desabilitado.</p>
        <hr>
        <p class="mb-0"><a href="https://www.hostnet.com.br/info/ativar-o-javascript-no-navegador/"><span style="color: green; "><strong>Habilite</strong></span></a> seu javascritp para visualizar o conteúdo do site sem erros.</p>
    </div>
</noscript>

    <!-- Navegacao -->

        <nav class="navbar navbar-expand navegacao">
            <a class="navbar-brand" href="index.php">Metodo<span class="logoV">LÓGICO</span></a>
                <div class="nav-item">
                    <a href="painel.php"><i class="fas fa-th-list icone"></i></a>
                </div>
                <div class="dropdown">
                    <button class="botao-perfil" type="button" id="menu-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-cog icone"></i> 
                    </button>
                    <div class="dropdown-menu opcoes-perfil" aria-labelledby="menu-dropdown">
                    <?php echo '<div class="texto-perfil text-center">'. $_SESSION['login'] .'</div>';?>
                        <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="editar-perfil.php"><i class="far fa-user"></i> Editar Perfil</a>
                      <a class="dropdown-item" href="mudar-senha.php"><i class="fas fa-key"></i> Mudar senha</a>
                      <div class="dropdown-divider"></div>
                      <?php echo '<a class="dropdown-item" href="logout.php?token='. $_SESSION['token'] .'"><i class="fas fa-sign-out-alt"></i> Deslogar</a>'; ?>
                    </div>
                </div>
        </nav>

    <!-- Fim da navegacao-->

    <!-- Form de edicao -->
    <div class="container">
        <div class="row">

                <div class="col col-lg-12 col-md-12 col-sm-12 mt-2 div-titulo">
                    <h1>Editar perfil</h1>
                    <hr>
                </div>

        </div>

        <form action='editarperfil.php' method="POST" onsubmit="return validar()">
                <div class="col col-lg-12 col-md-12 col-sm-12 mt-2 form-group div-perguntas">
                    <div class="form-row">

                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for='usr'><p>Usuário</p></label>
                         <input type="text" name="usrname" class='form-control usr' minlength="4" id="usr">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class='form-control' id="email">  
                        </div>
                    </div>

                </div>
                <hr>
                <button type="submit" class="btn btn-outline-success btn-criar-pergunta">Salvar alterações</button>
            </form>
    </div>

        <script src="_js/editar-perfil.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>