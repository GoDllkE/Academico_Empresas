<?php
// Requisitos
require '../VO/Categorias.php';
require_once '../Backend/Conexao.php';

class doCategoria {
    // Métodos
    function cadastraCategoria() {
        // Objetos
        $objRegiao = new Regiao();
        $objRegiao->preencheRegiao();

        // Define query
        $sqlRun = "INSERT nome INTO categorias VALUES ('".$objRegiao->getNome()."')";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro concluido com sucesso!');";
        header('location:./index.php');
    }

    function editaCategoria($codigo) {
        // Objetos
        $objRegiao = new Regiao();
        $objRegiao->preencheRegiao();

        // Define query
        $sqlRun = "UPDATE categorias SET nome='".$objRegiao->getNome()."' "
                . "WHERE codigo=".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro atualizado com sucesso!');";
        header('location:./index.php');
    }

    function listaCategoria() {
        // Define Query
        $sqlRun = "SELECT * FROM categorias";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    function removeCategoria($codigo) {
        // Define Query
        $sqlRun = "DELETE FROM categorias WHERE codigo = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();
    }    
}