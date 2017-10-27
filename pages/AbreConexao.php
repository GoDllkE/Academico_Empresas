<?php
    // Dados de conexão
    $servidor="localhost";
    $usuario="empresa";
    $senha="123456";
    $nomeDB="bdEmpresas";
    
    // String de conexao
    $conn=mysqli_connect($servidor,$usuario,$senha,$nomeDB) or die(mysqli_error($conn));
    
    // Definição do tipo de caracter utilizado
    mysqli_set_charset($conn, "utf8");
?>