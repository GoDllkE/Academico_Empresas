<?php

require '../Backend/doEmpresa.php';
require '../Backend/doServico.php';

class doListagem {
    
    function getConteudo($type) {
        if($type == 'company') {
            $objEmpresa = new doEmpresa();
            $sqlResulDetalhes = $objEmpresa->listaEmpresa();
            return $sqlResulDetalhes;
        } 
        else if ($type == 'services') {
            $objServico = new doServico();
            $sqlResulDetalhes = $objServico->listaServico();
            return $sqlResulDetalhes;
        }
        else {
            // header("location:./index.php?codPg=00");
        }
    }
    
    function getQuantidadeListada($type) {
        if($type == 'company') {
            $objEmpresa = new doEmpresa();
            $sqlResulDetalhes = $objEmpresa->listaEmpresa();
            $count = mysqli_num_rows($sqlResulDetalhes);
            return $count;
        } 
        else if ($type == 'services') {
            $objServico = new doServico();
            $sqlResulDetalhes = $objServico->listaServico();
            $count = mysqli_num_rows($sqlResulDetalhes);
            return $count;
        }
        else {
            // header("location:./index.php?codPg=00");
        }
    }
    
    function getEmpresaNome($codEmp) {
        $objEmpresa = new doEmpresa();
        $sqlResulDetalhes = $objEmpresa->buscaEmpresa($codEmp);
        
        if (mysqli_num_rows($sqlResulDetalhes) == 1) {
            $tblEmpresa = mysqli_fetch_array($sqlResulDetalhes);
            return $tblEmpresa['nome'];
        } else {
            return false;
        }
    }
    
    function getTitulo($tipo) {
        if ($tipo == 'services') { return "Serviço";}
        else if($tipo == 'company') { $titulo.="Empresa";}
    }
}
