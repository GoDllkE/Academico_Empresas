<?php 
    // Pega senhas primeiro
    $old_senha = md5($_POST['html_old_senha']);
    $senha = $_POST['html_senha'];

    // Verifica campos de senha
    $statusSenha = VerificaSenha($conn, $oldSenha, $newSenha);
    if($statusSenha == TRUE) {

        // Adiciona script de conexão
        include "./AbreConexao.php"; 

        // Armazena valores do form pelo POST
        $codigo = $_SESSION['codigo'];
        $nome = $_POST['html_nome']; 
        $endereco = $_POST['html_endereco'];
        $bairro = $_POST['html_bairro'];
        $email = trim($_POST['html_email']);
        $regioes = $_POST['html_regioes']; 
        $categorias = $_POST['html_categorias']; 

        if (empty($senha) && empty($oldSenha)) { $senha = NULL; }
        if (empty($_FILES['html_imagem'])) { $imagem = NULL; } 
        else {$imagem = preparaImagem();}
        
        // Atualiza empresa
        AtualizaEmpresa($conn, $nome, $endereco, $bairro, $email, $senha, $imagem, $regiao, $categoria);
        
    } else {
        // Retorna em falha
        return false;
    }
    
    function preparaImagem()
    {
        $imgOrig = $_FILES['html_imagem']['name']; 
        $imgTmp = $_FILES['html_imagem']['tmp_name'];
        $imgTam = $_FILES['html_imagem']['size']/1024; 
        $tiposPermitidos = array("png", "jpg", "jpeg"); 

        $vetor = explode(".", $imgOrig);
        $extImg = $vetor[count($vetor)-1];

        if(!in_array($extImg, $tiposPermitidos)){ 
            echo "Alert('Arquivo Inválido!');";
            header("location: ./index.php?codPg=10");
        }
        else if($imgTam > 500){ echo "Tamanho excedido (máx 500kb)";} 
        else {
            $novoNome = md5($email).".". $extImg;
            move_uploaded_file($imgTmp, "../src/img/" .$novoNome); 
        }
        return $novoNome;
    }
    
    
    /*
     * ******************** Função para atualizar cadastro da empresa ********************
     */
    function VerificaSenha($link, $oldSenha, $newSenha) 
    {
        // Não está tentando trocar a senha
        if (empty($oldSenha) && empty($$newSenha)) { return true; } 
        
        if ($oldSenha == $newSenha) { falhaUpdate("Falha no update: as senhas são identicas!"); return false; } 
        else if (strlen($newSenha) < 3) { falhaUpdate("Falha no update: senha menor que 3 caracteres!"); return false; } 
        else {
            $CheckSQL = "SELECT codigo,senha FROM empresas WHERE codigo =". $codigo ." AND senha ='". $senha ."'";
            $CheckResult = mysqli_query($conn, $CheckSQL);
            $tblCheck = mysqli_fetch_array($CheckResult);
            if (mysqli_num_rows($tblCheck) == 0) { falhaUpdate("Falha no update: senha atual invalida!"); return false; }
        }
        
        // Ultimo fluxo é verdadeiro
        return true;
    }
    
    /*
     * ******************** Função para atualizar cadastro da empresa ********************
     */
    function AtualizaEmpresa($link, $nome, $endereco, $bairro, $email, $senha, $imagem, $regiao, $categoria) 
    {
        $sqlUpdate = "UPDATE empresas SET";
        
        if(empty($senha) && empty($imagem)) {
            $sqlUpdate .= "nome='".$nome."', endereco='".$endereco."', email='".$email."', "
                  . "codigoRegiao='".$regioes."', codigoCategoria='".$categorias."' "
                  . "WHERE codigo=".$codigo;
        } else if (empty ($senha)) {
            $sqlUpdate .= "nome='".$nome."', endereco='".$endereco."', email='".$email."',"
                    . "imagem='".$novoNome."', codigoRegiao='".$regioes."', codigoCategoria='".$categorias."',"
                    . " WHERE codigo=".$codigo;
        } else if (empty ($imagem)) {
            $sqlUpdate .= "nome='".$nome."', endereco='".$endereco."', email='".$email."',"
                    . "senha='".$senha."', codigoRegiao='".$regioes."',codigoCategoria='".$categorias."',"
                    . " WHERE codigo=".$codigo;
        } else {
            $sqlUpdate .= "nome='".$nome."', endereco='".$endereco."', email='".$email."',"
                    . "senha='".$senha."', imagem='".$novoNome."', codigoRegiao='".$regioes."',"
                    . "codigoCategoria='".$categorias."' WHERE codigo=".$codigo;
        }
        
        mysqli_query($link, $sqlUpdate) or die(mysqli_error($link));
        mysqli_close($link);
        header("location:./index.php?codPg=12&codEmp=".$_SESSION['codigo']);
    }
    
    /*
     * ******************** Função de mensagem de erro da atualização ********************
     */
    function falhaUpdate($mensagem)
    {
        $_SESSION['updFail'] = 1;
        $_SESSION['updFailShow'] = 0;
        $_SESSION['msg'] = $mensagem;
        echo "Alert('".$mensagem."');";
        header("location: ./index.php?codPg=10");
    }
    
 ?>