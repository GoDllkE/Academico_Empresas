<?php
	//ISSET = é a forma para verificar se a variável existe 
	//nesse caso foi usada para verificar se a variável de sessão foi iniciada, caso ela tenha passado para 
	if(!isset($_SESSION['statusLogin']) || $_SESSION['statusLogin']==0){

?>

	<br><form action="Login.php" method="POST" name="FormLogin"> 
		<input type="text" name="html_email" placeholder="E-mail" class="CaixaTexto">
		<input type="password" name="html_senha" placeholder="Senha" class="CaixaTexto"> 
		<input type="submit" value="Acessar"> 

	</form>

	<a href="index.php?codPg=10" class="Links"> Cadastre-se </a><br><br>
	<hr>	

		<!-- Após feito a inicialização da sessão, desapareceremos com a parte de Login, já que estará logado na sessão DÃAAR!   --> 
<?php
}else{ ?>

	<b><?=$_SESSION['msg'];?></b>
	<a href="Logoff.php">Sair</a>

<?php
	}
?>  

<?php

	if (isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
	}

        
 //       header('location:./index.php');
?>
