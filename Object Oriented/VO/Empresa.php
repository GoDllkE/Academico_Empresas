<?php

class Empresa {
    
    // Atributos
    private $codigo;
    private $nome;
    private $endereco;
    private $bairro;
    private $email;
    private $regiao;
    private $categoria;
    private $senha;
    private $imagem;
    
    // Propriedades | Encapsulamento
    function setCodigo($codigo) { $this->codigo = $codigo;}
    function getCodigo() { return $this->codigo;}
    
    function setNome($nome) { $this->nome = $nome;}
    function getNome() { return $this->nome;}
    
    function setEndereco($endereco) { $this->endereco = $endereco;}
    function getEndereco() { return $this->endereco;}
    
    function setBairro($bairro) { $this->bairro = $bairro;}
    function getBairro() { return $this->bairro;}
    
    function setEmail($email) { $this->email = $email;}
    function getEmail() { return $this->email;}
    
    function setRegiao($regiao) { $this->regiao = $regiao;}
    function getRegiao() { return $this->regiao;}
    
    function setCategoria($categoria) { $this->categoria = $categoria;}
    function getCategoria() { return $this->categoria;}
    
    function setSenha($senha) { $this->senha = md5($senha);}
    function getSenha() { return $this->senha;}
    
    function setImagem($imagem) { $this->imagem = $imagem;}
    function getImagem() { return $this->imagem;}
 
    function preencheEmpresa() {
        $this->setNome($_POST['html_nome']);
        $this->setEndereco($_POST['html_endereco']);
        $this->setBairro($_POST['html_bairro']);
        $this->setRegiao($_POST['html_regiao']);
        $this->setCategoria($_POST['html_categoria']);
        $this->setEmail($_POST['html_email']);
        $this->setSenha($_POST['html_senha']);
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