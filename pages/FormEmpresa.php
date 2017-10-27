<?php
    // Abrindo a conexão
    include "./AbreConexao.php"; 
    
    // Recupera ID passada via GET em caso de edição
    if (isset($_SESSION['codigo'])) { 
        $id_empresa = $_SESSION['codigo'];
    
        // Query para Empresa a ser editada
        $sqlEmpresas = "SELECT * FROM empresas where codigo = ". $id_empresa; 
        $rsEmpresas = mysqli_query($conn, $sqlEmpresas) or die (mysqli_error($conn));
        $tblEmpresas = mysqli_fetch_array($rsEmpresas);
    }

    // Query para regiões
    $sqlRegioes = "SELECT * FROM regioes";
    $rsRegioes = mysqli_query($conn, $sqlRegioes) or die (mysqli_error($conn)); 

    // Query para categorias
    $sqlCategorias = "SELECT * FROM categorias";
    $rsCategorias = mysqli_query($conn, $sqlCategorias) or die (mysqli_error($conn)); 
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item">Empresas</li>
<?php if (isset($_SESSION['codigo'])) { ?>    
    <li class="breadcrumb-item">Edição da Empresa</li>
<?php } else { ?>
    <li class="breadcrumb-item">Cadastro da Empresa</li>
<?php } ?>
  </ol>
</nav>

<!-- Titulo do FORM -->
<div style=" width: 75%; margin-left: 20%">
    <div style="margin-left: 20%">
        <?php if (isset($_SESSION['codigo'])) { ?>    
            <h1>Edição da Empresa</h1>
        <?php } else { ?>
            <h1>Cadastro da Empresa</h1>
        <?php } ?>
    </div>
    </br></br>

<!-- Define o tipo de comportamento do Form de acordo com variavel via GET -->
<?php if (isset($_SESSION['codigo'])) { ?>
    <form action="./EditaEmpresa.php" method="POST" name="FormEditaEmpresa" enctype="multipart/form-data" class="form-group"> 
<?php } else { ?>
    <form action="./CadastraEmpresa.php" method="POST" name="FormCadastraEmpresa" enctype="multipart/form-data" class="form-group"> 
<?php } ?>
    <div style="width: 90%;">
        <label>Nome da empresa:</label><input type="text" class="form-control" name="html_nome" placeholder="Nome" class="CaixaTexto" <?php if (isset($_SESSION['nome'])){?> value='<?=$_SESSION['nome'];}?>'>
        </br>
    </div>
    <div class="row">
        <div class="col">
            <div style="width: 90%;">
                <label>Endereço:</label><input type="text" class="form-control" name="html_endereco" placeholder="Endereço" class="CaixaTexto" <?php if (isset($_SESSION['endereco'])){?> value='<?=$_SESSION['endereco'];}?>'>
            </div>
        </div>
        <div class="col">            
            <div style="margin-left: -11%; width: 90%;">
                <label>Bairro:</label><input type="text" class="form-control" name="html_bairro" placeholder="Bairro" class="CaixaTexto" <?php if (isset($_SESSION['bairro'])){?> value='<?=$_SESSION['bairro'];}?>'>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col">
            <!--  Loop para a busca e exibição das regiões feita pelo código de cada -->
            <div style="width: 90%;">
            <label>Região:</label><select name="html_regioes" class="form-control"></br>
            <?php
                while($tblRegioes = mysqli_fetch_array($rsRegioes)){  ?>
                    <option value = "<?=$tblRegioes['codigoR'];?>">
                        <?=$tblRegioes['nomeR'];?>
                    </option>     
            <?php } ?> </select>
            </div>
        </div>
        <div class="col">            
            <div style="margin-left: -11%; width: 90%;">
            <label>Categoria:</label><select name="html_categorias" class="form-control">
    <?php
        while($tblCategorias = mysqli_fetch_array($rsCategorias)){  ?> 
            <option value ="<?=$tblCategorias['codigoC'];?>">
                <?=$tblCategorias['nomeC'];?>
            </option>
    <?php } ?> </select>
            </div>  
        </div>
    </div>
    </br>
    <div style="width: 90%;">
        <?php if (isset($_SESSION['codigo'])) { ?>
        <?php } else { ?>
        <?php } ?>
        <label>E-mail:</label><input type="text" class="form-control" name="html_email" placeholder="E-mail principal" <?php if (isset($_SESSION['email'])){?> value='<?=$_SESSION['email'];}?>'>
        </br>
    </div>
    <div style="width: 90%;">
        <!-- Caso já esteja logado, um novo campo será mostrado -->
        <?php if (isset($_SESSION['codigo'])) { ?>
            <label>Senha atual:</label>
            <input type="password" class="form-control" id="html_old_senha" name="html_senha" placeholder="Senha" class="CaixaTexto" onblur="validaSenha()" onkeyup="validaSenha();">
            </br>
        <?php } ?>
    </div>
    <div style="width: 90%;">
        <?php if (isset($_SESSION['codigo'])) { ?>
            <label>Nova senha:</label>
        <?php } else { ?>
            <label>Senha:</label>
        <?php } ?>
        <input type="password" class="form-control" id="html_senha" name="html_senha" placeholder="Senha" class="CaixaTexto" onblur="validaSenha()" onkeyup="validaSenha();">
        </br>
    </div>
    <div style="width: 90%;">
        <?php if (isset($_SESSION['codigo'])) { ?>
            <label>Confirme sua nova senha:</label>
        <?php } else { ?>
            <label>Confirme sua senha:</label>
        <?php } ?>
        <input type="password" class="form-control" id="html_confsenha" name="html_confsenha" placeholder="Confirmar Senha" class="CaixaTexto" onblur="validaSenha()" onkeyup="validaSenha();">
        <font id="spanSenha" class="form-text" color="red"><span id="checkSenha">Coloque novamente sua senha</span></font>
    </br>
    </div>
        <div style="width: 90%;">
        <label>Logo da empresa: </label><input type="file" class="form-control-file" name="html_imagem">
        <font id="spanLogo" color="yellow"><span class="form-text text-muted"> (Tamanho máximo: 1MB. Tipos permitidos: png, jpg, jpeg) </span></font>
        </br>
    </div>
    <div style="margin-left: 28%; width: 30%">
        <center>
            <input type="submit" id="enviar" class="btn btn-primary" <?php if (isset($_SESSION['codigo'])){?> value='Atualizar' <?php } else { ?> value='Cadastrar' <?php } ?> />
        </center>
    </div>
</form>
</div>