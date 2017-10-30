<?php

class Regioes {
    
    // Atributos
    private $codigo;
    private $nome;
    
    // Propriedades | Encapsulamento
    function setCodigo($codigo) { $this->codigo = $codigo;}
    function getCodigo() { return $this->codigo;}
    
    function setNome($nome) { $this->nome = $nome;}
    function getNome() { return $this->nome;}

    function preencheRegiao() {
        $this->setNome($_POST['html_nome']);
    }
}