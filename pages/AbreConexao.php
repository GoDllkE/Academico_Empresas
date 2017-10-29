<?php
    // [Static] Dados de conexão 
    $servidor="localhost";
    $usuario="empresa";
    $senha="123456";
    $nomeDB="bdEmpresas";

    // Abre conexão
    $conn = mysqli_connect($servidor,$usuario,$senha,$nomeDB) 
        or die(mysqli_error($conector));

?>