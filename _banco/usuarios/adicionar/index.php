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
$nome_usuario = $_POST['nome_usuario'];
$user_usuario = $_POST['user_usuario'];
$senha_usuario = sha1($_POST['senha_usuario']);
$nivel_usuario = $_POST['nivel_usuario'];
$status_usuario = $_POST['status_usuario'];
$sql = "INSERT INTO `usuarios`(`nome_usuario`, `user_usuario`, `senha_usuario`, `nivel_usuario`, `status_usuario`) VALUES ('$nome_usuario', '$user_usuario', '$senha_usuario', '$nivel_usuario', '$status_usuario')";
$inserir = mysqli_query($conexao, $sql);
header('location:/'); // Tem que mudar //
?>