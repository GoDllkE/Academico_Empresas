<div class="box-parent-login" style="width: 75%;margin-left: 15%;">
    <div class="well bg-white box-login">
        <center>
            <h1 class="ls-login-logo">Login</h1>
        </center>
        <br>
        <form role="form" action="./Login.php" method="POST" name="FormLogin" class="form-group">
            <fieldset>                
                <div class="input-group ls-login-user">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input type="text" class="form-control" id="userEmail" name="html_email" placeholder="Ex: usuario@email.com" aria-label="Email" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="input-group ls-login-user">
                    <span class="input-group-addon" id="basic-addon2">#</span>
                    <input type="text" class="form-control" id="userEmail" type="password" name="html_senha" placeholder="Ex: 123456" aria-label="Senha" aria-describedby="basic-addon2">
                </div>
                <div  style="margin-top: 5px;"><a href="#">Esqueci a senha</a></div>
                <br>
                <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
                <p class="txt-center ls-login-signup" style="margin-top: 5px;">Não possui um login?
                    <a href="#">Cadastre-se agora</a>
                </p>
            </fieldset>
        </form>
    </div>
</div>