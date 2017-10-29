<?php
    if(isset($_GET['codEmp']) && !empty($_GET['codEmp'])) {
        $codEmp = $_GET['codEmp'];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf8">
        <title>Erro</title>
    </head>
    <body>
        <h1>Erro</h1>
        <hr>
        <p>Houve um erro no envio da mensagem. <a href="index.php?codPg=<?=$codEmp?>">Tentar novamente</a>.</p>
        <br>
        <a href="./index.php"> Voltar a pagina inicial </a>
    </body>
</html>