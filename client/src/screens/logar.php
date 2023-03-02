<?php
include('usuarios.php');

if (isset($_POST['email']) || isset($_POST['senha'])){

    if(strlen($_POST['email']) ==0) {
        echo "Preencha seu email";

    } else  if (strlen($_POST['senha']) ==0) {
        echo "preencha sua senha";
    }else {
        
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>páagina de login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" action="processa.php">

        <div class="main-login">

            <div class="left-login">
                <h1 id="text-login">Contribua com a evolução de sua cidade</h1>
                <img src="people-flag.svg" class="left-login-img" alt="people flag">
            </div>

            <div class="rigth-login">

                <div class="card-login">

                    <h1>Entrar</h1>

                    <div class="textfield">
                        <label for="email">E-mail</label>
                        <input type="text" name= email placeholder="E-mail" maxlength="30">
                    </div>

                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name= senha placeholder="Senha">
                    </div>

                    <button class="btn-login">Entrar</button>
                    <p>Ainda não é registrado?</p>
                    <a href="register.php">Cadastre-se</a>
    </form>
            </div>
        </div>
    </div>
</body>
</html>