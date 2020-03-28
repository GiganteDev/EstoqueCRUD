<?php
session_start(); // Inicia sessão
include '../../_banco/conexao.php'; // Chama a conexão do banco de dados
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
    <title>Adicionar produtos</title>
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
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
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
            <a class="dropdown-item" href="../../produtos/listar/">Produtos</a>
            <a class="dropdown-item" href="../../fornecedores/listar/">Fornecedores</a>
            <a class="dropdown-item" href="../../categorias/listar/">Categorias</a>
            <?php if($nivel == "administrador"): // Se for administrador, pode listar usuários ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../../usuarios/listar/">Usuários</a>
            <?php endif // Fim da condição ?>
          </div>
          <?php if(!($nivel == "conferente")): // Se for conferente, não pode adicionar nada ?>
            <?php if(!($nivel == "funcionario")): // Se for funcionário, não pode adicionar usuário ?>
              <li class="nav-item">
                <a class="nav-link" href="../../usuarios/adicionar/">Adicionar Usuário</a>
              </li>
            <?php endif // Fim da condição ?>
            <li class="nav-item active">
              <a class="nav-link" href="../../produtos/adicionar/">Adicionar Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../categorias/adicionar/">Adicionar Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../fornecedores/adicionar/">Adicionar Fornecedores</a>
            </li>
            <?php endif // Fim da condição ?>
        <?php endif // Fim da condição ?>
      </li>
      </ul>
      <span class="navbar-text">
        <?php if(isset($_SESSION['user'])): // Se a sessão existe, mostra o nome do usuário ?>
        <a href="../../logout/"><i class="fas fa-sign-out-alt"></i>&nbsp;<?php echo "$nome1 $nome2";?></a>
        <?php else: // Se a sessão não existe, mostra o botão de login ?>
          <a href="../../login/"><i class="fas fa-sign-in-alt"></i>&nbsp;<?php echo 'Login';?></a>
        <?php endif //Fim da condição ?>
      </span>
    </div>
  </nav>
<div class="container">
  <div class="py-5 text-center">
    <h2>Adicionar produtos</h2>
    <p class="lead">Abaixo está um exemplo de formulário criado com os controles de formulário do Bootstrap.</p>
  </div>
  <center>
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Dados do produto</h4>
        <form action="../../_banco/produtos/adicionar/" method="POST" class="needs-validation" novalidate>
        <div class="row">
            <div class="col mb">
                <label for="nroProduto">Nro produto</label>
                <input name="nro_produto" type="number" class="form-control" id="nroProduto" placeholder="Nome" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb">
                <label for="nomeProduto">Nome do produto</label>
                <input name="nome_produto" type="text" class="form-control" id="nomeProduto" placeholder="Nome" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mb">
                <label for="quantidadeProduto">Quantidade</label>
                <input name="quantidade_produto" type="number" class="form-control" id="quantidadeProduto" placeholder="Nome" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
            </div>
        </div>
        


        <hr class="mb-4">
        <h4 class="mb-3">Categoria</h4>
        <div class="d-block my-3">
<?php
include '../../_banco/conexao.php';
$sql = "SELECT * FROM categorias";
$busca = mysqli_query($conexao, $sql);
$cont = 0;
while ($array = mysqli_fetch_array($busca)):
    $cont = $cont + 1;
    $id = $array['id'];
    $categorias = $array['categoria']
?>
          <div class="custom-control custom-radio">
            <input name="categoria_produto" value="<?php echo $categorias; ?>" id="<?php echo $categorias; ?>" name="nivel_usuario" type="radio" class="custom-control-input" <?php echo ($cont==1) ? "checked" : ""; ?> required>
            <label class="custom-control-label" for="<?php echo $categorias; ?>"><?php echo $categorias; ?></label>
          </div>
<?php endwhile ?>
        </div>
        <hr class="mb-4">
        <h4 class="mb-3">Fornecedor</h4>
        <div class="d-block my-3">
<?php
$sql = "SELECT * FROM fornecedores";
$busca = mysqli_query($conexao, $sql);
$cont = 0;
while ($array = mysqli_fetch_array($busca)):
    $cont = $cont + 1;
    $id = $array['id'];
    $fornecedores = $array['fornecedor']
?>
          <div class="custom-control custom-radio">
            <input name="fornecedor_produto" value="<?php echo $fornecedores; ?>" id="<?php echo $fornecedores; ?>" name="status_usuario" type="radio" class="custom-control-input" <?php echo ($cont==1) ? "checked" : ""; ?> required>
            <label class="custom-control-label" for="<?php echo $fornecedores; ?>"><?php echo $fornecedores; ?></label>
          </div>
<?php endwhile ?>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Adicionar</button>
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