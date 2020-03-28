<?php
session_start();
include '../../conexao.php';
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
$nome_categoria = $_POST['nome_categoria']; // Recebe o valor do atributo
// Comando de inserção dos dados na tabela:
$sql = "INSERT INTO `categorias`(`categoria`) VALUES ('$nome_categoria')";
// Faz a conexão dos dados no banco:
$inserir = mysqli_query($conexao, $sql);
header('location:/'); // Tem que mudar //
?>