<?php
include_once('conexao.php');

//superglobal -> $_POST
$id = mysqli_escape_string($conexao,$_GET['id']);

//$sql = "Chamando a proc e excluindo com base no ID";
$comando = "call sp_produto(3,$id,'',0,'');";

if(mysqli_query($conexao,$comando)){
    header('Location:listaprod.php?excluido');
}else{
    header('Location:listaprod.php?falha');
}