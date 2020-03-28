<?php
include '../../conexao.php';
$categoria_produto = $_POST['categoria_produto']; // Recebe o valor do atributo
// Comando de inserção dos dados na tabela:
$sql = "INSERT INTO `categorias`(`categoria`) VALUES ('$categoria_produto')";
// Faz a conexão dos dados no banco:
$inserir = mysqli_query($conexao, $sql);
header('location:/categorias/listar/');
?>