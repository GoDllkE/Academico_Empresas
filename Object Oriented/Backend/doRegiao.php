<?php
// Requisitos
require '../VO/Regioes.php';
require_once '../Backend/Conexao.php';

class doRegiao {
    
    // Métodos
    function cadastraRegiao() {
        // Instancia do objeto
        $objRegiao = new Regioes();
        $objRegiao->preencheRegiao();

        // Define query
        $sqlRun = "INSERT nome INTO regioes VALUES ('".$objRegiao->getNome()."')";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro concluido com sucesso!');";
        header('location:./index.php');
    }

    function editaRegiao($codigo) {
        // Instanciad o objeto
        $objRegiao = new Regioes();
        $objRegiao->preencheRegiao();

        // Define query
        $sqlRun = "UPDATE regioes SET nome='".$objRegiao->getNome()."' "
                . "WHERE codigo=".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro atualizado com sucesso!');";
        header('location:./index.php');
    }

    function buscaRegiao($codigo) {
        // Define Query
        $sqlRun = "SELECT * FROM regioes WHERE codigoR = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    function listaRegiao() {
        // Define Query
        $sqlRun = "SELECT * FROM regioes";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    function removeRegiao($codigo) {
        // Define Query
        $sqlRun = "DELETE FROM regioes WHERE codigo = ". $codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();
    }
}