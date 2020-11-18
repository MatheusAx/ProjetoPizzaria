<?php
//conectando ao banco
$servidor = 'localhost';
$usuario = 'root';
$senha = 'usbw';
$bancoDeDados= 'pizzaria';

$conexao = mysqli_connect($servidor,$usuario,$senha,$bancoDeDados);
$conexao2 = mysqli_connect($servidor,$usuario,$senha,$bancoDeDados);
mysqli_set_charset($conexao,'utf8');

if(mysqli_connect_error()){
    echo "erro na conexão: ". mysqli_connect_error();
}
?>