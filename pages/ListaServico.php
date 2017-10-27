<?php
    // Abre conexão
    include "./AbreConexao.php";
    
    // Query
    $sqlServicos = "SELECT * FROM servicos";
    $rsServicos = mysqli_query($conn, $sqlServicos) or die (mysqli_error($conn));
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Serviços</li>
    <li class="breadcrumb-item active" aria-current="page">Lista de Serviços</li>
  </ol>
</nav>

<div class="row">
    <?php
        $cont = 0;
        while ($tblServicos = mysqli_fetch_array($rsServicos)) {
    ?>
    <div class="col-md-3">
        <a href="?codPg=12&codEmp=<?=$tblEmpresas['codigo'];?>">
            </br>
            <img width="250px" height="250px" src="../src/img/<?= $tblServicos['imagem']; ?>"class="imgMini">
            </br>
            <center><?=$tblServicos['nome']; ?></center>
        </a>
    </div>
    <?php
        $cont++;
        if ($cont == 4) {
            echo "</div><div class=row>";
            $cont = 0;
        }
    } ?>
</div>

