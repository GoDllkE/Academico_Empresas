<?php
    // Abrindo a conexão
    include "./AbreConexao.php"; 

    // Query para Empresas
    $sqlEmpresas = "SELECT codigo, nome FROM empresas"; 
    $rsEmpresas = mysqli_query($conn, $sqlEmpresas) or die (mysqli_error($conn)); 

?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item">Serviço</li>
    <li class="breadcrumb-item">Cadastro de Serviços</li>
  </ol>
</nav>

<div style=" width: 75%; margin-left: 25%">
    <div style="margin-left: 12%">
        <h1>Cadastro de serviço</h1>
    </div>
    </br></br>
    <form action="./CadastraServico.php" method="post" name="FormCadastraServico.php" enctype="multipart/form-data" class="form-group" style="width: 75%;">
        <label>Empresa: </label><select name="html_empresa" class="form-control"></br>
            <?php
                while($tblEmpresas = mysqli_fetch_array($rsEmpresas)){  ?>
                    <option value = "<?=$tblEmpresas['codigo'];?>">
                        <?=$tblEmpresas['nome'];?>
                    </option>     
            <?php } ?> </select>
        </br>
        <label>Nome do serviço:</label><input type="text" class="form-control" name="html_nome" placeholder="Nome do servico" class="CaixaTexto" />
        </br>
        <label>Descrição:</label><input type="text" class="form-control" name="html_descricao" placeholder="Descricao" class="CaixaTexto" />
        </br>
        <div class="row">
            <div class="col">
                <label>Valor do serviço:</label><input type="number" class="form-control" name="html_valor" placeholder="R$ 0,00" class="CaixaTexto" />
            </div>
            <div class="col">
                <label>Imagem:</label><input type="file" class="form-control-file" name="html_imagem"/>
            </div>
        </div>
        </br>
        <center>
            <input type="submit" id="enviar" class="btn btn-primary" value="Cadastrar">
        </center>
    </form>
</div>