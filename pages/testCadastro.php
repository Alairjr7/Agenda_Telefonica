<?php
   
include_once('config.php');

if(isset($_POST["nome"]) && isset($_POST["senha"])) {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    
    

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha) VALUES ('$nome', '$senha')");
    header('location:index.php');
    
}else
{
    header('location:cadastar_usuario.php');
    
}
   
