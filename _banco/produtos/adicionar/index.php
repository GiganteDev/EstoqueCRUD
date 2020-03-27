<?php
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