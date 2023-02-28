
<?php
    require_once 'class/usuarios.php';
    $u= new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta de cep</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <form method="POST">
    <div class= "main-register">

        <div class="card-register">
                <h1>Cadastre-se.</h1>
                <form action="" method="post">

            <div class="textfield">
                <label for="name">Nome:</label>
                <input type="text" placeholder="Informe seu nome" name="name" maxlength="30"><br>
            </div>

            <div class="textfield">
                <label for="email">Email:</label>                    
                <input type="email" placeholder="Informe seu melhor e-mail" name="email"  maxlength="40"><br>
            </div>

            <div class="textfield">
                <label for="password">Senha:</label>
                <input type="password" placeholder="Senha" name="password" ><br>
            </div>

           <div class="textfield">
                <label for="password-confirm">Confirme sua senha:</label>
                <input type="password" placeholder="Senha" name="copy-password" ><br>
           </div>
       
           <button class="btn-register">Cadastrar</button>  
              </form>
        </div>  
    </form>
        
    </div>
<?php
if(isset($_POST['nome']))
{

    $nome= addslashes($_POST['nome']);
    $email = addslashes($_POST['email']); 
    $password= addslashes($_POST['password']);
    $copyPassword= addslashes($_POST['copy-password']);
    if(!empty($nome) && !empty($email) && !empty($password) && !empty($copyPassword))
    {
        $u->conectar("web-cep", "localhsot", "root", "root");
        if($u->msgErro == "")
        {
            if($password ==$copyPassword)
            
             {
                if($u->cadastrar($nome, $email, $password))
                {
                    echo "Cadastrado com sucesso!";
                }
                else{
                    echo "Email ja cadastrado!";

                }
            }
            else{
                echo "Senha e confirmar senha não correpondem";
            }
        }
        else 
        {
            echo "Error: ".$u->msgErro;
        }
    }else{
        echo "Preencha todos os campos";
    }
}


?>
</body>
</html>