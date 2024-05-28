<?php
   session_start();
include_once('config.php');

if(isset($_POST["nome"]) && isset($_POST["senha"])) {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome'AND senha = '$senha'";
    $resultado = $conexao ->query($sql);
    
    if(mysqli_num_rows($resultado)< 1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('location:index.php');
    }
    else{
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('location:cadastrar_contatos.php');
    }
    
}else
{
    header('location:index.php');
}
   