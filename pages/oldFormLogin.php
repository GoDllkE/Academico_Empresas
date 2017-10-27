<?php    
    //ISSET = é a forma para verificar se a variável existe 
    //nesse caso foi usada para verificar se a variável de sessão foi iniciada, caso ela tenha passado para 
    if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin']==0) {
?>

<br>
<div class="form-inline my-2 my-lg-0">
    <form action="./Login.php" method="POST" name="FormLogin" class="form-inline my-2 my-lg-0">
        <label><font color="white" >E-mail: </font></label> <input type="text" class="form-control mr-sm-2" id="html_email" name="html_email" placeholder="E-mail" class="CaixaTexto">
        <label><font color="white" >Senha: </font></label> <input type="password" class="form-control mr-sm-2" id="html_senha" name="html_senha" placeholder="Senha" class="CaixaTexto"> 
        <input type="submit" class="btn btn-outline-primary my-2 my-sm-0" value="Login"> 
    </form>
    <div style="margin-left: 5px;"
         <form action="./index.php?codPg=10" method="POST" name="FormCadastra" class="form-inline my-2 my-lg-0">
            <a href="./index.php?codPg=10" >
                <input type="button" class="btn btn-outline-info my-2 my-sm-0" value="Cadastrar">
            </a>
        </form>
    </div>
</div>

<!-- Após feito a inicialização da sessão, desapareceremos com a parte de Login, já que estará logado na sessão DÃAAR!   --> 
<?php } else { include './LoginAttempt.php';?>
<div class="form-inline my-2 my-lg-0">
    <span class="navbar-text">Logado como: <b><font color="blue"><?=$_SESSION['nome'];?></font></b></span>
    <div style="margin-left: 5px;"
        <form action="./Logoff.php" method="POST" name="FormSair" class="form-inline my-2 my-lg-0">
            <a href="./Logoff.php">
                <input type="button" class="btn btn-outline-danger my-2 my-sm-0" value="Sair">
            </a>
        </form>
    </div>
</div>
<?php } ?>


<?php if (isset($_SESSION['msg'])) { echo $_SESSION['msg']; } ?>