<?php 
    // Adiciona script de conexão
    include "./AbreConexao.php"; 

    // Armazena valores do form pelo POST
    $nome = $_POST['html_nome']; 
    $endereco = $_POST['html_endereco'];
    $bairro = $_POST['html_bairro'];
    $email = $_POST['html_email'];
    $regioes = $_POST['html_regioes']; 
    $categorias = $_POST['html_categorias']; 

    // forma simples de criptografia de senha
    $senha = md5($_POST['html_senha']); 

    /*
     * aqui pega o nome do arquivo fisíco, para não ir à pasta temporária, 
     * mantendo a originalidade dele no servidor
     */
    $imgOrig = $_FILES['html_imagem']['name']; 
    $imgTmp = $_FILES['html_imagem']['tmp_name'];
    
    // Limite de upload de arquivo (1MB)
    $imgTam = $_FILES['html_imagem']['size']/1024; 

    // Criar um vetor para permição de tipos de arquivos permitidos
    $tiposPermitidos = array("png", "jpg", "jpeg"); 
    
    /*
     * Retornar com o vetor explodido, separado pelo ponto, 
     * no que vai pegar o ultimo vetor que é então o tipo do arquivo 
     */
    $vetor = explode(".", $imgOrig); 

    // Acessando o ultima posição do vetor
    $extImg = $vetor[count($vetor)-1]; 
    
    //chave de busca e extensão de imagem
    if(!in_array($extImg, $tiposPermitidos)){ 
        /* 
        * Usamos a função em array que já é a recursividade do próprio PHP, 
        * que no caso foi negado para ficar mais fácil colocando as coisas mais simples 
        * no início e depois faremos o else para o aceitar positivamente o arquivo
        */
        echo "Arquivo Inválido";
    }else if($imgTam > 500){	
        echo "Tamanho excedido (máx 500kb)";
    }else{
        /* 
        * Com a variável e-mail nõa temos possibilidade de ter duas empresas 
        * se usássemos os nomes 
        */
        $novoNome = md5($email).".". $extImg;
        move_uploaded_file($imgTmp, "../src/img/" .$novoNome); 
        $sqlCadastra = "INSERT INTO empresas(nome, endereco, bairro, email, senha, imagem, codigoRegiao, codigoCategoria) VALUES ('$nome','$endereco', '$bairro', '$email', '$senha', '$novoNome', '$regioes', '$categorias')"; 		

        mysqli_query($conn, $sqlCadastra) or die(mysqli_error($conn));
        // Close mysql connection
        mysqli_close($conn);
        header("location:./index.php?codPg=11");
    }
 ?>