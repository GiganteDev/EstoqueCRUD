<?php
session_start(); // Inicia sessão
include '../_banco/conexao.php'; // Chama a conexão do banco de dados
if(isset($_SESSION['user'])){ // Se estiver logado (sessão ativa)
  $usuario = $_SESSION['user']; // Pega user do usuário logado na sessão
  $sql = "SELECT `nome_usuario`, `nivel_usuario` FROM `usuarios` WHERE user_usuario = '$usuario' AND status_usuario='ativo'";
  $busca = mysqli_query($conexao, $sql);
  while($array = mysqli_fetch_array($busca)){
    $nome = $array['nome_usuario'];
    $nivel = $array['nivel_usuario'];
    $nome = explode(' ', $nome);
  }
  $nome1 = (isset($nome['0'])) ? $nome['0'] : '';
  $nome2 = (isset($nome['1'])) ? $nome['1'] : '';
}
if(!(isset($_SESSION['user']))){
  header("location:/");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Estoque</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/95f9171d07.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../_css/style.css'>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Estoque</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://github.com/q1dcc" target="_blank">GitHub</a>
        </li>
        <?php if(isset($_SESSION['user'])): // Se não estiver logado, não pode ver as páginas ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administração
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="listar_produtos.php">Produtos</a>
            <a class="dropdown-item" href="listar_fornecedores.php">Fornecedores</a>
            <a class="dropdown-item" href="listar_categorias.php">Categorias</a>
            <?php if($nivel == "administrador"): // Se for administrador, pode listar usuários ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="listar_usuarios.php">Usuários</a>
            <?php endif // Fim da condição ?>
          </div>
          <?php if(!($nivel == "conferente")): // Se for conferente, não pode adicionar nada ?>
            <?php if(!($nivel == "funcionario")): // Se for funcionário, não pode adicionar usuário ?>
              <li class="nav-item">
                <a class="nav-link" href="adicionar_usuario.php">Adicionar Usuário</a>
              </li>
            <?php endif // Fim da condição ?>
            <li class="nav-item">
              <a class="nav-link" href="adicionar_produto.php">Adicionar Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adicionar_categoria.php">Adicionar Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adicionar_fornecedor.php">Adicionar Fornecedores</a>
            </li>
            <?php endif // Fim da condição ?>
        <?php endif // Fim da condição ?>
      </li>
      </ul>
      <span class="navbar-text">
        <?php if(isset($_SESSION['user'])): // Se a sessão existe, mostra o nome do usuário ?>
        <a href="../_login/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;<?php echo "$nome1 $nome2";?></a>
        <?php else: // Se a sessão não existe, mostra o botão de login ?>
          <a href="login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;<?php echo 'Login';?></a>
        <?php endif //Fim da condição ?>
      </span>
    </div>
  </nav>
<div class="container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>
  <center>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Dados do cadastro</h4>
      <form class="needs-validation" novalidate>
      <div class="row">
          <div class="col mb">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Nome" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
        

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col mb">
            <label for="firstName">Senha</label>
            <input type="password" class="form-control" id="senha_usuario" placeholder="Senha" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>


        <hr class="mb-4">
        <h4 class="mb-3">Nível de controle</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input value="administrador" id="administrador" name="nivel_usuario" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="administrador">Administrador</label>
          </div>
          <div class="custom-control custom-radio">
            <input value="funcionario" id="funcionario" name="nivel_usuario" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="funcionario">Funcionário</label>
          </div>
          <div class="custom-control custom-radio">
            <input value="3" id="3" name="nivel_usuario" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="3">Conferente</label>
          </div>
        </div>
        <hr class="mb-4">
        <h4 class="mb-3">Nível de controle</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input value="ativo" id="ativo" name="status_usuario" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="ativo">Administrador</label>
          </div>
          <div class="custom-control custom-radio">
            <input value="inativo" id="inativo" name="status_usuario" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="inativo">Funcionário</label>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
  </center>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-<?php echo date("Y"); ?> Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>
</html>