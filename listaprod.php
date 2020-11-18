<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once('conexao.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Cadastro de Produtos</title>
</head>

<body>

<h1>Lista dos Produtos</h1>
<div class="container">    
    <table class= "table table-striped table-dark table-hover " >
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>PREÇO</th>
            <th>CATEGORIA</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            <?php
            //$comando = "select * from produto (MOSTRA O CONTEUDO) ";
            $comando = "call sp_produto(5,0,'',0,0)";
            $resultado = mysqli_query($conexao, $comando);
            while ($Produto = mysqli_fetch_array($resultado)) {
            ?>
                <!--html-->
                <tr>
                    <td><?php echo $Produto['idproduto']; ?></td>
                    <td><?php echo $Produto['nome']; ?></td>
                    <td><?php echo $Produto['valorUnitario']; ?></td>
                    <td><?php echo $Produto['idcategoria_produto']; ?></td>
                    <td><a href="atprod.php?id=<?php echo $Produto['idproduto']; ?>"  class="btn btn-warning" >ATUALIZAR</a> | <a href="excluir.php?id=<?php echo $Produto['idproduto']; ?>" class="btn btn-danger" >EXCLUIR</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="container">
    <a href="cadprod.php" class="btn btn-success" >Novo Produto</a>
    <a href="index.php" class="btn btn-primary" >Voltar ao menu</a>
    </div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>

</html>