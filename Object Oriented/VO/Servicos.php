<?php

class Servicos {
    
    // Atributos
    private $codigo;
    private $nome;
    private $descricao;
    private $valor;
    private $imagem;
    private $empresa;
    
    // Propriedades | Encapsulamento
    function setCodigo($codigo) { $this->codigo = $codigo;}
    function getCodigo() { return $this->codigo;}
    
    function setNome($nome) { $this->nome = $nome;}
    function getNome() { return $this->nome;}
    
    function setDescricao($descricao) { $this->descricao = $descricao;}
    function getDescricao() { return $this->descricao;}
    
    function setValor($valor) { $this->valor = $valor;}
    function getValor() { return $this->valor;}
    
    function setEmpresa($empresa) { $this->empresa = $empresa;}
    function getEmpresa() { return $this->empresa;}

    function setImagem($imagem) { $this->imagem = $imagem;}
    function getImagem() { return $this->imagem;}
 
    function preencheServico() {
        $this->setNome($_POST['html_nome']);
        $this->setDescricao($_POST['html_descricao']);
        $this->setValor($_POST['html_valor']);
        $this->setEmpresa($_POST['html_empresa']);
        $this->setImagem($this->preparaImagem(1024));
    }
    
    function preparaImagem($tamanhoMaximo) {
        // Pega imagem do objeto
        $imgOrig = $_POST['html_imagem']['name'];
        $imgTmp = $_POST['html_imagem']['tmp_name'];

        // Limite do tamanho de upload de arquivo
        $imgTam = $_POST['html_imagem']['size']/1024; 

        // Criar um vetor para permição de tipos de arquivos permitidos
        $tiposPermitidos = array("png", "jpg", "jpeg");

        // Retornar com o vetor explodido, separado pelo ponto, 
        // no que vai pegar o ultimo vetor que é então o tipo do arquivo 
        $vetor = explode(".", $imgOrig); 

        // Acessando o ultima posição do vetor
        $extImg = $vetor[count($vetor)-1]; 

        // Chave de busca e extensão de imagem
        if(!in_array($extImg, $tiposPermitidos)){
            echo "alert('Tipo de imagem não permitido, tente novamente!');";
            return false;
        }else if($imgTam > $tamanhoMaximo){	
            echo "alert('Imagem maior que'".$tamanhoMaximo." MB. Tente novamente!);";
            return false;
        }else{
            $novaImagem = md5($this->getEmail()).".". $extImg;
            move_uploaded_file($imgTmp, "../Resources/img/client/" .$novaImagem);
            return $novaImagem;
        }    
    }
    
}