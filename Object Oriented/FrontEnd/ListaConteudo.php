<?php 
    // Arquivo de conexão
    require '../Backend/doListagem.php';
    
    // GET
    $tipo = $_GET['type'];
    
    // Objeto
    $objListagem = new doListagem();
    
    // lista
    $sqlResulDetalhes = $objListagem->getConteudo($tipo);
    
    // Contador
    $count = $objListagem->getQuantidadeListada($tipo);
    
    // Titulo
    $titulo = $objListagem->getTitulo($tipo);
    
    
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?=$titulo?></li>
    <li class="breadcrumb-item active" aria-current="page">Lista de <?=$titulo?>s</li>
  </ol>
</nav>
<br>
<div class="row">
    <div id="Contador">
        <?="Total de ".$count." encontradas!";?>
    </div>
    <br><hr><br>
    <?="Dados: ". $sqlResulDetalhes?>
    <?php while ($tblDetalhes = mysqli_fetch_array($sqlResulDetalhes)) { ?>
    <div class="col-md-3" style="margin-top: 2%">
        <div class="card" style="width: 250px; height: 250px; margin-top: 2%">
            <?php if($tipo == 'company') { ?>
            <a href="?codPg=03&codEmp=<?=$tblDetalhes['codigo'];?>">
            <?php } else {?>
            <a href="?codPg=03&codSrv=<?=$tblDetalhes['codigo'];?>">
            <?php } ?>
                <img style="width: 250px; height: 200px;"class="card-img" src="../Resources/img/client/<?= $tblDetalhes['imagem']; ?>" alt="<?=$tblDetalhes['nome'];?>">
            </a>
            <div class="card-body">
                <center>
                    <p class="card-text"><?=$tblDetalhes['nome'];?></p>
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