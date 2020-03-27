<?php
include '../_banco/conexao.php'; // Inclui script de conexão ao DB
$user_usuario = $_POST['user']; // Recebe do form o user
$senha_usuario = $_POST['senha']; // Recebe do form a senha
$sql = "SELECT user_usuario, senha_usuario FROM usuarios WHERE user_usuario='$user_usuario' AND status_usuario='ativo'" ;
$busca = mysqli_query($conexao,$sql); // Busca o user no DB
$total = mysqli_num_rows($busca); // Verifica se há algum user no db

while($array = mysqli_fetch_array($busca)){
    $senha = $array['senha_usuario'];
    $senha_deco = sha1($senha_usuario);
    if($total>0){
        #conferir senha
        if($senha == $senha_deco){
            session_start();
            $_SESSION['user'] = $user_usuario;
            header('Location:/');
        }
    } else {
        #envia mensagem de erro
    }
}
?>