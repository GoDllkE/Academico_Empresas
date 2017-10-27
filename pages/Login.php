<?php
    // TimeZone
    date_default_timezone_set('America/SaoPaulo');

    // Iniciando objetos de sessão PHP
    session_start();

    // Incluindo conexão
    include "./AbreConexao.php"; 
    
    // Informações do form via POST
    $email=$_POST['html_email'];
    $senha=md5($_POST['html_senha']);
    
    // Query
    $sqlLogin="SELECT * FROM empresas WHERE email like '$email' AND senha like '$senha'"; 
    $rsLogin=mysqli_query($conn, $sqlLogin) or die (mysqli_error($conn));
    
    if(mysqli_num_rows($rsLogin)==0){
        $_SESSION['statusLogin']=2;
        $_SESSION['msg']="Dados Inválidos!";
    } else {
        $tblLogin = mysqli_fetch_array($rsLogin);
        $_SESSION['codigo']=$tblLogin['codigo'];
        $_SESSION['nome']=$tblLogin['nome'];
        $_SESSION['endereco']=$tblLogin['endereco'];
        $_SESSION['bairro']=$tblLogin['bairro'];
        $_SESSION['email']=$tblLogin['email'];
        $_SESSION['imagem']=$tblLogin['imagem'];
        $_SESSION['statusLogin']=1;
        $_SESSION['horaLogin']=date('d-m-y h:i');
        $_SESSION['msg']="Bem vindo novamente, ".$_SESSION['nome']."!";
        
    }
    // Close mysql connection
    mysqli_close($conn);
    header('location:./index.php'); 
?>