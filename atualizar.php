<?php
include_once('conexao.php');

//superglobal -> variavel POST $_POST
$id = mysqli_escape_string($conexao,$_POST['id']);

$nome = mysqli_escape_string($conexao,$_POST['nome']);
$valor = mysqli_escape_string($conexao,$_POST['valor']);
$categoria = mysqli_escape_string($conexao,$_POST['categoria']);

//$sql = "Chamando a proc mantendo os campos já declarados";
$comando = "call sp_produto(2,$id,'$nome',$valor,'$categoria');";

if(mysqli_query($conexao,$comando)){
    header('Location:listaprod.php?atualizado');
}else{
    header('Location:listaprod.php?falha');
}

