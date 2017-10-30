<?php
// ---------------------------------------------
// Requisitos
require '../VO/Servicos.php';
require_once '../Backend/Conexao.php';

// ---------------------------------------------
class doServico {
    // Métodos
    function cadastraServico() {
        // Objeto
        $objServicos = new Servicos();
        $objServicos->preencheServico();

        // Define query
        $sqlRun = "INSERT nome, descricao, valor, codigoEmpresa, imagem "
                . "INTO servicos VALUES ("
                . "'".$objServicos->getNome()."','".$objServicos->getDescricao()."','".$objServicos->getValor()."',"
                . "'".$objServicos->getEmpresa()."','".$objServicos->getImagem()."')";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro concluido com sucesso!');";
        header('location:./index.php');
    }

    function editaServico($codigo) {
        // Objeto
        $objServicos = new Servicos();
        $objServicos->preencheServico();

        // Define query
        $sqlRun = "UPDATE servicos SET "
                . "nome='".$objServicos->getNome()."',descricao='".$objServicos->getDescricao()."',"
                . "valor='".$objServicos->getValor()."',codigoEmpresa=".$objServicos->getEmpresa().","
                . "imagem='".$objServicos->getImagem()." WHERE codigo=".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro atualizado com sucesso!');";
        header('location:./index.php');
    }

    function buscaServico($codigo) {
        // Define Query
        $sqlRun = "SELECT * FROM servicos WHERE codigo = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    function listaServico() {
        // Define Query
        $sqlRun = "SELECT * FROM servicos";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    function removeServico($codigo) {
        // Define Query
        $sqlRun = "DELETE FROM servicos WHERE codigo = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();
    }
}