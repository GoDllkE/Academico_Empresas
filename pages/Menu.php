<?php 
    // Script de conexão
    include "./AbreConexao.php";

    // Query para regiões
    $sqlRegioes="SELECT * FROM regioes";
    $rsRegioes = mysqli_query($conn, $sqlRegioes) or die (mysqli_error($conn)); 
?> 

<!-- submenu dropdown da navbar localizada no index.php -->
<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<?php
    while($tblRegioes=mysqli_fetch_array($rsRegioes)){ ?>
        <a class="dropdown-item" href="./index.php?codPg=11&codReg=<?= $tblRegioes['nomeR']?>">
            <?=$tblRegioes["nomeR"];?>
        </a>
    <?php } ?>
</div>