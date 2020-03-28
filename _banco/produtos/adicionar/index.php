<?php
session_start(); // Inicia sessão
include '../../conexao.php'; // Chama a conexão do banco de dados
if(isset($_SESSION['user'])){ // Se estiver logado (sessão ativa)
  $usuario = $_SESSION['user']; // Pega user do usuário logado na sessão
  $sql = "SELECT `nivel_usuario` FROM `usuarios` WHERE user_usuario = '$usuario' AND status_usuario='ativo'";
  $busca = mysqli_query($conexao, $sql);
  while($array = mysqli_fetch_array($busca)){
    $nivel = $array['nivel_usuario'];
  }
  if(($nivel == "funcionario") || ($nivel == "conferente")){
    header('location:/');
    exit();
  }
}
if(!(isset($_SESSION['user']))){
  header("location:/");
  exit();
}
include '../../conexao.php';
$nro_produto = $_POST['nro_produto']; // Recebe o valor do atributo
$nome_produto = $_POST['nome_produto']; // Recebe o valor do atributo
$categoria_produto = $_POST['categoria_produto']; // Recebe o valor do atributo
$quantidade_produto = $_POST['quantidade_produto']; // Recebe o valor do atributo
$fornecedor_produto = $_POST['fornecedor_produto']; // Recebe o valor do atributo
// Comando de inserção dos dados na tabela:
$sql = "INSERT INTO `produtos`( `nro_produto`, `nome_produto`, `categoria_produto`, `quantidade_produto`, `fornecedor_produto`) VALUES ($nro_produto,'$nome_produto','$categoria_produto',$quantidade_produto,'$fornecedor_produto')";
// Faz a conexão dos dados no banco:
$inserir = mysqli_query($conexao, $sql);
header('location:/'); // Tem que mudar //
?>