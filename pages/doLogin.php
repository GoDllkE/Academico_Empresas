<?php session_start();?> 

<html>
    <head>
        <meta charset="UTF-8">
        
        <!-- (Opcional)Carregando Bootstrap/JQuery/JS da internet (Precisa de internet)  -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        
        
        <!-- Carregando Bootstrap (Precisa de internet) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        
    </head>
    <body>
        </br></br></br>
        <center><h3>Login</h3></center> 
        <div style="width: 30%;margin-left: 36%;">
            <form action="./Login.php" method="POST" name="FormLogin" enctype="multipart/form-data" class="form-group"> 
                </br></br>
                <div style="width: 90%" class="input-group">
                    <span class="input-group-addon" id="sizing-addon1">@</span>
                    <input type="text" class="form-control" name="html_email" placeholder="E-mail"/></p>
                </div>    
                </br>
                <div style="width: 90%" class="input-group">
                    <span class="input-group-addon" id="sizing-addon1">#</span>
                    <input type="password" class="form-control" id="html_senha" name="html_senha" placeholder="Senha">
                </div>  
                </br>
                <center>
                    <input type="submit" id="enviar" style="width: 25%" class="btn btn-primary" value="Login">
                </center>
            </form>
        </div>
    </body>
</html>