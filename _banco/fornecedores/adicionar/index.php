<?php
include '../../conexao.php';
$fornecedor_produto = $_POST['fornecedor_produto']; // Recebe o valor do atributo
// Comando de inserção dos dados na tabela:
$sql = "INSERT INTO `fornecedores`(`fornecedor`) VALUES ('$fornecedor_produto')";
// Faz a conexão dos dados no banco:
$inserir = mysqli_query($conexao, $sql);
header('location:/'); // Tem que mudar //
?>