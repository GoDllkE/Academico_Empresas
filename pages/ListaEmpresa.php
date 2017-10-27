<?php
    // Abre conexão
    include "./AbreConexao.php";
    
    // Query
    $sqlEmpresas = "SELECT * FROM empresas";
    $rsEmpresas = mysqli_query($conn, $sqlEmpresas) or die (mysqli_error($conn));
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresas</li>
    <li class="breadcrumb-item active" aria-current="page">Lista de Empresas</li>
  </ol>
</nav>

<div class="row">
    <?php
        $cont = 0;
        while ($tblEmpresas = mysqli_fetch_array($rsEmpresas)) {
    ?>
    <div class="col-md-3" style="margin-top: 2%">
        <div class="card" style="width: 250px; height: 250px; margin-top: 2%">
            <a href="?codPg=12&codEmp=<?=$tblEmpresas['codigo'];?>">
                <img style="width: 250px; height: 200px;"class="card-img" src="../src/img/<?= $tblEmpresas['imagem']; ?>" alt="<?=$tblEmpresas['nome'];?>">
            </a>
            <div class="card-body">
                <center>
                    <p class="card-text"><?=$tblEmpresas['nome'];?></p>
                </center>
            </div>
        </div>
    </div>
    <?php
        $cont++;
        if ($cont == 4) {
            echo "</div><div class=row>";
            $cont = 0;
        }
    } ?>
</div>