<?php

class preparaImagens {
    
    function preparaImagem($tamanhoMaximo) {
        // Pega imagem do objeto
        $imgOrig = $this->getImagem()['name'];
        $imgTmp = $this->getImagem()['tmp_name'];

        // Limite do tamanho de upload de arquivo
        $imgTam = $this->getImagem()['size']/1024; 

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
            move_uploaded_file($imgTmp, "../src/img/" .$novaImagem);
            return $novaImagem;
        }
    }
}
?>