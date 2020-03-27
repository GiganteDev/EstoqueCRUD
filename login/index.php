<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/95f9171d07.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='_css/style.css'>
</head>
<?php

session_start(); // Inicia sessão
if(isset($_SESSION['user']) ){ // Se sessão existir
    header("location:/"); // Manda pro index
    exit(); // Sai da pagina sem carregar
}

?>
<body>
    <div class="container">
        <center>
            <form class="form-signin" method="POST" action="../_banco/login.php">
                <img class="mb-4" src="_img/logo.png" alt="logo" width="120" height="120">
                <h1 class="h3 mb-3 font-weight-normal">Bem vindo(a)</h1>
                <label for="inputUser" class="sr-only">Usuário</label>
                <input type="text" id="inputUser" class="form-control" placeholder="Usuário" name="user" required autofocus autocomplete="off">
                <label for="inputSenha" class="sr-only">Senha</label>
                <input type="password" id="inputSenha" class="form-control" placeholder="Senha" name="senha" required autocomplete="off">
                <center>
                    <p>Você não possui cadastro? Clique <a href="adicionar_usuario_externo.php">aqui</a></p>
                </center>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-<?php echo date("Y")?></p>
            </form>
        </center>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>