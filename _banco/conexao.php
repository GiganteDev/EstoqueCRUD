<?php
$servername = "localhost"; // Padrão - server local
$username = "root"; // Padrão - root
$password = ""; // Senha de conexão do DB
$database = "estoque"; // Alterar conforme o nome do DB
// Criação da conexão:
$conexao = mysqli_connect($servername, $username, $password, $database);