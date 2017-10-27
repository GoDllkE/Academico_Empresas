<?php

function pegaValor($valor) { return isset($_POST[$valor]) ? $_POST[$valor] : '';}

function validaEmail($email) { return filter_var($email, FILTER_VALIDATE_EMAIL);}

function enviaEmail($origem, $assunto, $mensagem, $destino, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($destino, $assunto, nl2br($mensagem), $headers);
}

// Variaveis com valores da mensagem
$email_servidor = "email@servidorwebphp.com";
$para = $_POST['email'];
$de = $_SESSION['email'];
$mensagem = $_POST['mensagem'];
$assunto = $_POST['assunto'];

?>