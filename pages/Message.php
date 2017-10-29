<?php
if (isset($_SESSION['statusLogin'])) {
    if ($_SESSION['statusLogin'] == 2) {
        $_SESSION['messageTitle'] = "Erro";
        $_SESSION['messageContent'] = "Login não encontrado... Tente novamente."; 
    } else if ($_SESSION['statusLogin'] == 1) {
        $msg = "Bem vindo novamente, ". $_SESSION['nome'];
        $classe = "alert alert-success alert-dismissible fade show";
    } else {
        $msg = "";
    }
}
?>

<!-- Exibe alerta se houve tentativa de login, apenas -->
<?php 
    if (!isset($_SESSION['statusLogin'])) {
        // Do Nothing
    } else {
    if($_SESSION['statusLogin'] == 1 || $_SESSION['statusLogin'] == 2) { ?>
        <!-- Alerta -->
        <div class="<?=$classe?>" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=$msg?>
    <?php } }?>
</div>