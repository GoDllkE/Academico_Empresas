<?php
// Requisitos
require '../VO/Empresa.php';
require_once '../Backend/Conexao.php';

// Iniciando objetos de sessão PHP
session_start();

function realizaLogin() {
    // Dados
    $objEmpresa = new Empresa();
    
    $objEmpresa->setEmail($_POST['html_email']);
    $objEmpresa->setSenha(md5($_POST['html_senha']));
    
    // Query
    $sqlRun = "SELECT * FROM empresas WHERE email like ". $objEmpresa->getEmail().""
            . " AND senha like '". $objEmpresa->getSenha();
    
    $objConexao = new Conexão();
    $sqlResulLogin = $objConexao->executaSQL($sqlRun);
    $objConexao->fechaConexao();
    
    if (mysqli_num_rows($sqlResulLogin)) {
        // Inicializa sessão
        session_start();
        $this->preencheSessao($sqlResulLogin);
    } else {
        session_abort();
        $_SESSION['message'] = "Usuário não encontrado. Tente novamente!";
        header("location:./index.php?codPg=01");
    }
    
    // Redireciona para index
    header("location:./index.php");
}

function realizaLogoff() {
    session_abort();
    session_destroy();
}

function preencheSessao($sqlResult) {
    //
    $tblLogin = mysqli_fetch_array($sqlResult);
        
    // Define variaveis da sessão
    $_SESSION['statusLogin']=1;
    $_SESSION['codigo']=$tblLogin['codigo'];
    $_SESSION['nome']=$tblLogin['nome'];
    $_SESSION['endereco']=$tblLogin['endereco'];
    $_SESSION['bairro']=$tblLogin['bairro'];
    $_SESSION['email']=$tblLogin['email'];
    $_SESSION['imagem']=$tblLogin['imagem'];
    
    // Mensagem
    $_SESSION['message'] = "Bem vindo, ".$_SESSION['nome']."!";
}
?>