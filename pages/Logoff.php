<?php
    // Inicializa objetos da sessão PHP
    session_start();
    
    // Mensagem
    if(isset($_SESSION['statusLogin']) || $_SESSION['statusLogin'] != 0) { ?>
        <!-- Alerta -->
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Desconectado!
        </div>
    <?php }
    
    // Definido valores do objeto
    $_SESSION['codigo']=0;
    $_SESSION['nome']=null;
    $_SESSION['email']=null;
    $_SESSION['imagem']=null;
    $_SESSION['statusLogin']=3;
    $_SESSION['horaLogin']=null;
    
    // Viewbox 
    $_SESSION['messageTitle']=null;
    $_SESSION['messageContent']=null;
    
    // Destroy sessão
    session_destroy();

    // Redirecionador
    header('location:./index.php');
?>