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
/*
    $host = 'localhost';  
    $db = 'id9155796_metodologico';
    $user = 'id9155796_barsotti';
    $pass = 'metodologico';
    
    $con = mysqli_connect($host, $user, $pass, $db);

    $select = "SELECT * FROM `user` WHERE userName = '" . $username . "' or userMail = '" . $email . "'";
    $sql = "INSERT INTO `user`(`userName`, `userPass`, `userMail`, `userType`) VALUES ('". $username . "', '" . $userpass . "' , '" . $email . "', " . $usertype . "  )";

    if(!$con){
      die('Erro na conexao!' . mysqli_connect_error());
    }

    $select = mysqli_query($con, $select) or die('Erro de query: ' . mysqli_error());
    $row = mysqli_fetch_assoc($select);
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel - MetodoLOGICO</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="_css/painel.css">
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
                      <?php 
                        echo '<a class="dropdown-item" href="logout.php?token='.md5(session_id()).'"><i class="fas fa-sign-out-alt"></i> Deslogar</a>';
                      ?>
                    </div>
                </div>
        </nav>

    <!-- Fim da navegacao-->

    <!-- Perguntas -->
    <div class="container">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-2 ff">
                <h1 class="text-center quantidade-questionarios"></h1>
                <div class="col col-lg-8 col-md-8 col-sm-8 mx-auto mt-2 btnn"><a href="respostas.php" class="btn mx-auto botao-criar">Criar</a></div>
            </div>
            <div class="col mx-auto col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-5">
                <table class="perguntas">
                    <tr>
                        <td class="perguntas-inner"> {Titulo} <a href="jogar-admin.html" onclick="jogarQuestionario(titulo)"> <i class="far fa-play-circle ml-5 btn-jogar btn-inner-pergunta"></i> </a> <a href="#" onclick=""> <i class="far fa-edit ml-4 btn-editar btn-inner-pergunta"></i> </a> <a href="" data-toggle="modal" data-target="#modalexcluir"> <i class="far fa-times-circle ml-4 btn-excluir btn-inner-pergunta"></i> </a> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalexcluir" tabindex="-1" role="dialog" aria-labelledby="modallabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Excluir</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Tem certeza que deseja excluir o questionário?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="button" class="btn btn-primary fechar-modal" onclick="excluirQuestionario()">Confirmar</button>
                </div>
              </div>
            </div>
          </div>




        <script src="_js/painel.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>