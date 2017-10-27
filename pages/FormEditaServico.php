<div style=" width: 75%; margin-left: 25%">
    <div style="margin-left: 12%">
        <h1>Edição de serviço</h1>
    </div>
    </br></br>
    <form action="./CadastraServico.php" method="post" name="FormCadastraServico.php" enctype="multipart/form-data" class="form-group" style="width: 75%;">
        <label>Nome do serviço:</label><input type="text" class="form-control" name="html_nome" placeholder="Nome do servico" class="CaixaTexto" />
        </br>
        <label>Descrição:</label><input type="text" class="form-control" name="html_descricao" placeholder="Descricao" class="CaixaTexto" />
        </br>
        <div class="row">
            <div class="col">
                <label>Valor do serviço:</label><input type="number" class="form-control" name="html_valor" placeholder="R$ 0,00" class="CaixaTexto" />
            </div>
            <div class="col">
                <label>Imagem:</label><input type="file" class="form-control-file" name="html_imagem" class="CaixaTexto" />
            </div>
        </div>
        </br>
        <center>
            <input type="submit" id="enviar" class="btn btn-primary" value="Cadastrar">
        </center>
    </form>
</div>