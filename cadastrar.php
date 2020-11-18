<?php
include_once('conexao.php');

//superglobal -> $_POST
$nome = mysqli_escape_string($conexao,$_POST['nome']);
$valor = mysqli_escape_string($conexao,$_POST['valor']);
$categoria = mysqli_escape_string($conexao,$_POST['categoria']);

//$sql = "insert into tabela (campo1,campo2,etc) values (".$nome.")";
$comando = "call sp_produto(1,0,'$nome','$valor','$categoria');";

if(mysqli_query($conexao,$comando)){
    header('Location:index.php?sucesso');
}else{
    header('Location:index.php?falha');
}


