<?php 
    // Arquivo de conexão
    include "./AbreConexao.php"; 

    // Pega código da empresa
    $codEmp = $_GET['codEmp']; 
    
    // Query
    $sqlDetalhes = "SELECT * FROM servicos s, empresas e "
            . "WHERE s.codigoEmpresa = c.codigo";
    
    // Execução da Query
    $rsDetalhes = mysqli_query($conn, $sqlDetalhes) or die(mysqli_error($conn));

    // DataSet
    if(mysqli_num_rows ($rsDetalhes) == 0)
        echo "Não há dados a serem exibidos!"; 
    else {
        $tblDetalhes = mysqli_fetch_array($rsDetalhes); 
?> 

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Serviços</a></li>
    <li class="breadcrumb-item"><a href="ListaServico.php">Lista de Serviços</a></li>
    <li class="breadcrumb-item active" aria-current="page">Serviço <?=$tblDetalhes['nome'];?></li>
  </ol>
</nav>

<div class = "row">
    <div class="col-md-5"> 
        <img style="margin-top: 5%; margin-left: 30%;" width="300px" height="300px" src ="../src/img/<?=$tblDetalhes['imagem'];?>"class="img-thumbnail">
    </div>

    <div style="position: absolute; margin-top: 3%; margin-left:35%;"class = "col-md-6"> 		
        <font class = "Dados"> 
            <?="Nome: ".$tblDetalhes['nomeS'];?> </br> 
            <?="Endereço: ".$tblDetalhes['descricao'];?> </br> 
            <?="Bairro: ".$tblDetalhes['valor'];?> </br> 
            <?="Empresa: ".$tblDetalhes['nomeE'];?> </br> 
            </br>
        </font>
        <a href="#">
            <input type="button" class="btn btn-outline-success my-2 my-sm-0" value="Editar">
        </a>
        <a href="#">
            <input type="button" class="btn btn-outline-danger my-2 my-sm-0" value="Deletar" style="margin-left: 5px;">
        </a>    
    </div>
</div>
<?php
}	
?> 

<?php
    // Verifica se possui sessão
    if(isset($_SESSION['statusLogin']))
        if($_SESSION['statusLogin']==1 && $codEmp == $_SESSION['codigo']){
?>
    </br>			
    <font>...</font><a href="?codPg=20">Cadastrar Serviço</a> 
<?php
    include "./ListaServico.php";
    }
?>



