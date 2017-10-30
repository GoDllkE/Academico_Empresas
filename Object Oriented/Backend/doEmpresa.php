<?php
// ---------------------------------------------
// Requisitos
require '../VO/Empresa.php';
require_once '../Backend/Conexao.php';

// ---------------------------------------------
class doEmpresa {
    // Métodos
    function cadastraEmpresa() {
        // Objeto
        $objEmpresa = new Empresa();
        $objEmpresa->preencheEmpresa();

        // Define query
        $sqlRun = "INSERT nome, endereco, bairro, codigoRegiao, codigoCategoria, senha, imagem "
                . "INTO empresas VALUES ("
                . "'".$objEmpresa->getNome()."','".$objEmpresa->getEndereco()."','".$objEmpresa->getBairro()."',"
                . "'".$objEmpresa->getEmail()."','".$objEmpresa->getRegiao()."','".$objEmpresa->getCategoria()."',"
                . "'".$objEmpresa->getSenha()."','".$objEmpresa->getImagem()."')";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro concluido com sucesso!');";
        header('location:./index.php');
    }

    // ---------------------------------------------

    function editaEmpresa($codigo) {
        // Objeto
        $objEmpresa = new Empresa();
        $objEmpresa->preencheEmpresa();

        // Define query
        $sqlRun = "UPDATE empresas SET "
                . "nome='".$objEmpresa->getNome()."',endereco='".$objEmpresa->getEndereco()."',"
                . "bairro='".$objEmpresa->getBairro()."',codigoRegiao=".$objEmpresa->getRegiao().","
                . "codigoCategoria=".$objEmpresa->getCategoria().",senha='".$objEmpresa->getSenha().","
                . "imagem='".$objEmpresa->getImagem()." WHERE codigo=".$codigo.";";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        echo "alert('Cadastro atualizado com sucesso!');";
        header('location:./index.php');
    }

    // ---------------------------------------------

    function buscaEmpresa($codigo) {
        // Define Query
        $sqlRun = "SELECT * FROM empresas WHERE codigo = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    // ---------------------------------------------

    function listaEmpresa() {
        // Define Query
        $sqlRun = "SELECT * FROM empresas";

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $sqlResult = $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();

        // Retorna dataset
        return $sqlResult;
    }

    // ---------------------------------------------

    function removeEmpresa($codigo) {
        // Define Query
        $sqlRun = "DELETE FROM empresas WHERE codigo = ".$codigo;

        // Abre objeto de conexão ao BD
        $objDB = new Conexão();
        $objDB->executaSQL($sqlRun);
        $objDB->fechaConexao();
    }
}