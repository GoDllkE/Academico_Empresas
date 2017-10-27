function validaSenha(){
    // Pegando senha de um form atravéz do campo ID
    senha = document.getElementById("html_senha").value;
    verificaSenha = document.getElementById("html_confsenha").value;
    
    if (senha !== verificaSenha) {
        document.getElementById("html_senha").focus;
        document.getElementById("spanSenha").color="red";
        document.getElementById("checkSenha").innerHTML = "Senhas não conferem...";
        return false;
    }
    else {
        document.getElementById("spanSenha").color="green";
        document.getElementById("checkSenha").innerHTML = "Senhas são identicas!";
        return true;
    }
}