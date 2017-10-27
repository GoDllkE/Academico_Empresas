<?php 
    // Arquivo de conexão
    include "./AbreConexao.php"; 

    // Pega código da empresa
    $codEmp = $_GET['codEmp']; 
    
    // Query
    $sqlDetalhes = "SELECT * FROM empresas e, regioes r, categorias c "
                    . "WHERE e.codigo = '$codEmp'"
                        . "AND e.codigoRegiao = r.codigoR "
                        . "AND e.codigoCategoria = c.codigoC";
    
    // Execução da Query
    $rsDetalhes = mysqli_query($conn, $sqlDetalhes) or die(mysqli_error($conn));

    // DataSet
    if(mysqli_num_rows ($rsDetalhes) == 0)
        echo "Não há empresas cadastradas!"; 
    else {
        $tblDetalhes = mysqli_fetch_array($rsDetalhes); 
?> 

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active">Empresas</li>
    <li class="breadcrumb-item"><a href="./index.php?codPg=11">Lista de empresas cadastradas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Empresa <?=$tblDetalhes['nome'];?></li>
  </ol>
</nav>

<div class =  "row">
    <div class="col-md-5"> 
        <img style="margin-top: 5%; margin-left: 30%;" width="350px" height="350px" src ="../src/img/<?=$tblDetalhes['imagem'];?>"class="img-thumbnail">
    </div>

    <?php if (isset($_SESSION['statusLogin']) && ($_GET['codEmp'] == $_SESSION['codigo'])) { ?>
    <div style="position: absolute; margin-top: 3%; margin-left:45%;"class = "col-md-6">
    <?php } else { ?>
    <div style="position: absolute; margin-top: 2%; margin-left:45%;"class = "col-md-6">
    <?php } ?>
        <font class = "Dados"> 
            <form action="#" method="POST" name="mensagemEmpresa" class="form-group" >
                <b>Nome: </b><?=$tblDetalhes['nomeC'];?> </br> 
                <b>Endereço: </b><?=$tblDetalhes['endereco'];?> </br> 
                <b>Bairro: </b><?=$tblDetalhes['bairro'];?> </br> 
                <b>Região: </b><?=$tblDetalhes['nomeR'];?> </br> 
                <b>E-mail: </b><?=$tblDetalhes['email'];?> </br>
                <?php if (isset($_SESSION['statusLogin']) && ($_GET['codEmp'] == $_SESSION['codigo'])) { ?>
                    <div style="margin-top: -2%;">
                        <br>
                        <a href="./index.php?codPg=10">
                            <input type="button" id="Editar" name="Editar" class="btn btn-outline-success" value="Editar" />
                        </a>
                        <a href="#">
                            <input type="button" id="Desativar" name="Desativar" class="btn btn-outline-danger" value="Desativar" onclick="DesativaEmpresa();"/>
                        </a>
                    </div>
                <?php } else { ?>
                    <b>Mensagem: </b><br>
                    <textarea class="form-control form-control-feedback" id="mensagem" name="mensagem" autofocus="true" maxlength="200" placeholder="Mensagem para a empresa aqui..." > </textarea> <br>
                    <input type="submit" id="enviar" name="enviar" class="btn btn-outline-primary" value="Enivar Mensagem" />
                <?php } ?>
            </form>
        </font>
    </div>
</div>
<hr>
<?php } ?>