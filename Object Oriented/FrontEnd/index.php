<?php 
    session_start(); 
    
    require '../Backend/doRegiao.php';
    require '../Backend/doCategoria.php'; 
    
    // DataSet para regioes
    $objRegiao = new doRegiao();
    $sqlResulRegiao = $objRegiao->listaRegiao();
    
    // DataSet para categorias
    $objCategoria = new doCategoria();
    $sqlResulCategoria = $objCategoria->listaCategoria();
?>

<html>
    <head>
        <meta charset="UTF-8">

        <!-- Carregando funções JS pré compiladas do Bootstrap/JQuery/JS -->
        <script src="../Resources/js/popper.js"></script>
        <script src="../Resources/js/jquery-3.2.1.js"></script>
        <script src="../Resources/js/bootstrap.js"></script>
        <script src="../Resources/js/bootstrap.bundle.js"></script>
        
        <!-- Carregando CSS do Bootstrap  -->
        <link rel="stylesheet" href="../Resources/css/bootstrap.css" />
        
        <!-- Carregamento do efeito Parallax -->
        <script src="../Resources/js/parallax.js"></script>
        <link rel="stylesheet" href="../Resources/css/parallax.css" />
        
        <!-- Carregamento do JS personalizado 
        <script src="../Resources/js/funcoes.js"></script>
        -->
        
    </head>
    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php">
                <img src="../Resources/img/main/satelite-logo.png" width="30px" height="30px"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- Inclui Regiões ao NavBar -->
                <li class="nav-item">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Regiões
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php while ($tblRegioes = mysqli_fetch_array($sqlResulRegiao)) { ?>
                        <a class="dropdown-item" href="#./index.php?codPg=03&codReg=<?=$tblRegioes['nomeR']?>"><?=$tblRegioes["nomeR"];?></a>
                        <?php } ?>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="#./index.php?codPg=11">Adicionar nova região</a>
                    </div>
                </li>
                <li class="nav-item">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php while ($tblCategorias = mysqli_fetch_array($sqlResulCategoria)) { ?>
                        <a class="dropdown-item" href="#<?=$tblCategorias['nomeC']?>"><?=$tblCategorias["nomeC"];?></a>
                        <?php } ?>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="#./index.php?codPg=11">Adicionar nova categoria</a>
                    </div>
                </li>
                <li class="nav-item">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Empresas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin']!=1){ ?>
                        <a class="dropdown-item" href="./index.php?codPg=10">Cadastrar empresa</a>
                        <?php } else { ?>
                        <a class="dropdown-item" href="./index.php?codPg=10">Editar empresa</a>
                        <?php } ?>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="./index.php?codPg=03?type='services'">Ver empresas cadastradas</a>
                    </div>
                </li>
                <li class="nav-item">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Serviços
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php if(isset($_SESSION['statusLogin']) && $_SESSION['statusLogin']==1){ ?>
                        <a class="dropdown-item" href="./index.php?codPg=20">Adicionar serviço</a>
                        <a class="dropdown-item" href="./index.php?codPg=03">Ver meus serviços</a>
                        <hr class="dropdown-divider">
                        <?php } ?>
                        <a class="dropdown-item" href="./index.php?codPg=03?type='services'">Procurar serviços</a>
                    </div>
                </li>
              </ul>
                <!-- Verifica se há sessão para definir objeto de exibição -->
              <?php  if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin']!=1){ ?>
              <form class="form-inline my-2 my-lg-0">
                  <a href="./index.php?codPg=01">
                    <input type="button" class="btn btn-outline-warning my-2 my-sm-0" value="Login">
                  </a>
                  <a href="./index.php?codPg=10">
                    <input type="button" class="btn btn-outline-primary my-2 my-sm-0" value="Cadastrar" style="margin-left: 5px;">
                  </a>
              </form>
              <?php } else { ?>
                <div class="form-inline my-2 my-lg-0">
                    <span class="navbar-text">Logado como: <b><font color="yellow"><a href="./index.php?codPg=12&codEmp=<?=$_SESSION['codigo']?>"><?=$_SESSION['nome'];?></a></font></b></span>
                    <div style="margin-left: 15px;"
                         <form action="../Backend/doLogin.php" method="POST" name="FormSair" class="form-inline my-2 my-lg-0">
                            <a href="../Backend/doLogin.php">
                                <input type="button" class="btn btn-outline-danger my-2 my-sm-0" value="Sair">
                            </a>
                        </form>
                    </div>
                </div>
              <?php } ?>
            </div>
        </nav>
        <br>
        <!--senão houver a variável codPg, carrega padrão -->
        <?php if(!isset($_GET['codPg'])) { include "./indexContent.php";} ?>
        <div class="container">
                <div class="row">
                    <!-- Conteudo do site -->
                    <div style="margin-top: 50px" class="col-md-12">
                        <?php 
                        if(isset($_GET['codPg'])) { 
                            $codPg=$_GET['codPg'];
                            if($codPg==00){ include "./PaginaErro.php";}
                            else if($codPg==01){ include "./Login.php";}
                            else if($codPg==02){ include "./FormularioEmpresa.php";}
                            else if($codPg==03){ include "./ListaConteudo.php";}
                            else if($codPg==04){ include "./DetalheConteudo.php";}
                            else {
                                if (isset($_SESSION['statusLogin']) && $_SESSION['statusLogin'] == 1) {
                                    if($codPg==05){ include "./FormularioRegiao.php";}
                                    else if($codPg==06){ include "./FormularioServico.php";}
                                    else if($codPg==07){ include "./FormularioCategoria.php";}
                                } else {
                                    include "./PaginaErro.php";
                                }
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>