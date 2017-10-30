<?php 
    // Arquivo de conexão
    require '../Backend/doListagem.php';
    require '../Backend/doEmpresa.php';
    require '../Backend/doServico.php';
    
    // Titulo padrão
    $titulo="Not Defined";
    
    if (isset($_GET['type'])) {
        if($_GET['type'] == 'company') {
            // Define titulo da pagina
            $titulo = "Empresa";
            $objEmpresa = new doEmpresa();
            $sqlResultDetalhes = $objEmpresa->listaEmpresa();
        }
        else if($_GET['type'] == 'services') {
            // Define titulo da pagina
            $titulo = "Serviço";
            $objServico = new doServico();
            $sqlResulDetalhes = $objServico->listaServico();
        }
        else { 
            // Caso tipo seja invalido, retorna pagina de erro
            header('location:./index.php?codPg=00');
        }
        
        // Verifica quantidade encontrada
        if (mysqli_num_rows($sqlResulDetalhes) == 0) {
            echo "Não há ".$titulo." cadastrados!";
        } else {
            $count = mysqli_num_rows($sqlResulDetalhes);
            $tblDetalhes = mysqli_fetch_array($sqlResulDetalhes);
        }
    } else {
        // Caso não tenha o tipo definido, retorna pagina de erro
        header('location:./index.php?codPg=00');
    }
?>

<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active"><?=$titulo?></li>
    <li class="breadcrumb-item"><a href="./index.php?codPg=11">Lista de <?=$titulo?>s cadastradas</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?=$titulo?> <?=$tblDetalhes['nome'];?></li>
  </ol>
</nav>

<div class =  "row">
    <div class="col-md-5"> 
        <img style="margin-top: 5%; margin-left: 30%;" width="350px" height="350px" src ="../Resources/img/client/<?=$tblDetalhes['imagem'];?>"class="img-thumbnail">
    </div>

    <?php if (isset($_SESSION['statusLogin']) && ($_GET['codEmp'] == $_SESSION['codigo'])) { ?>
    <div style="position: absolute; margin-top: 3%; margin-left:45%;"class = "col-md-6">
    <?php } else { ?>
    <div style="position: absolute; margin-top: 2%; margin-left:45%;"class = "col-md-6">
    <?php } ?>
        <font class = "Dados"> 
            <b>Nome: </b><?=$tblDetalhes['nome'];?> </br>
            <?php if($_GET['type'] == 'company') { ?>
            <b>Endereço: </b><?=$tblDetalhes['endereco'];?> </br> 
            <b>Bairro: </b><?=$tblDetalhes['bairro'];?> </br> 
            <b>Região: </b><?=$tblDetalhes['nomeR'];?> </br> 
            <b>E-mail: </b><?=$tblDetalhes['email'];?> </br>
            <?php } else {?>
            <b>Valor: </b><?=$tblDetalhes['valor'];?> </br> 
            <b>Empresa: </b><?=$nome_empresa?> </br>
            <b>Descrição: </b><?=$tblDetalhes['descricao'];?> </br>
            <?php } ?>
            
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