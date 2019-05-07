<?php  
session_start();
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Criar pergunta - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/respostas.css">
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

    <!-- Perguntas -->
    <div class="container">
    <form action='criapergunta.php' method="POST">
        
                <div class="col col-lg-12 col-md-12 col-sm-12 mt-3 form-group div-perguntas">
                    <div class="form-row">

                        <div class="form-group col-lg-10 col-md-8 col-sm-8 col-xs-8">
                        <label for='pergunta'><p>Pergunta</p></label>
                         <input type="text" name="questao-pergunta" class='form-control pergunta' id="pergunta" min-length="3" maxlength="150" required>
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-sm-4 col-xs-4">
                        <label for='pergunta'><p>Tempo Limite</p></label>
                            <select id="input-tempo" class="form-control" name="tempo">
                              <option value="5">5 s</option>
                              <option value="10">10 s</option>
                              <option value="15" selected>15 s</option>
                              <option value="20">20 s</option>
                              <option value="30">30 s</option>
                              <option value="45">45 s</option>
                              <option value="60">1 min</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="resposta-1">Resposta 1</label>
                            <input type="text" name="resposta1" class='form-control' id="resposta-1" maxlength="80" required> <input type="radio" id='resp-1' name="repostacorreta" value="1" checked> <label for="resp-1"> <i class="far fa-check-circle opcao-correta"></i> </label> 
                        </div>
                        <div class="col form-group">
                            <label for="resposta-2">Resposta 2</label>
                            <input type="text" name="resposta2" class='form-control' id="resposta-2" maxlength="80" required> <input type="radio" id='resp-2' name="repostacorreta" value="2"> <label for="resp-2"> <i class="far fa-check-circle opcao-correta" id='resp-2'></i> </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label for="resposta-3">Resposta 3</label>
                            <input type="text" name="resposta3" class='form-control' id="resposta-3" maxlength="80" required> <input type="radio" id='resp-3' name="repostacorreta" value="3"> <label for="resp-3"> <i class="far fa-check-circle opcao-correta" id='resp-3'></i> </label>
                        </div>
                        <div class="col form-group">
                            <label for="resposta-4">Resposta 4</label>
                            <input type="text" name="resposta4" class='form-control' id="resposta-4" maxlength="80" required> <input type="radio" id='resp-4' name="repostacorreta" value="4"> <label for="resp-4"> <i class="far fa-check-circle opcao-correta" id='resp-4'></i> </label>
                        </div>
                    </div>

                </div>
                <hr>
                <input type="submit" class="btn btn-outline-success btn-criar-pergunta" value="Criar">
            </form>
    </div>

        <script src="_js/perguntas.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>