<?php
include '../conexao.php';
$nome_usuario = $_POST['nome_usuario'];
$user_usuario = $_POST['user_usuario'];
$senha_usuario = sha1($_POST['senha_usuario']);
$nivel_usuario = $_POST['nivel_usuario'];
$status_usuario = $_POST['status_usuario'];
$sql = "INSERT INTO `usuarios`(`nome_usuario`, `user_usuario`, `senha_usuario`, `nivel_usuario`, `status_usuario`) VALUES ('$nome_usuario', '$user_usuario', '$senha_usuario', '$nivel_usuario', '$status_usuario')";
$inserir = mysqli_query($conexao, $sql);
header('location:/'); // Tem que mudar //
?>