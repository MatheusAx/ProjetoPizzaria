<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once('conexao.php');

$id = mysqli_escape_string($conexao, $_GET['id']);
$comando = "call sp_produto(4,$id,'',0,'')";

$resultado = mysqli_query($conexao, $comando);
$Produto = mysqli_fetch_array($resultado);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Atualização de Produtos</title>
</head>

<body>


<div class="container">

    <h1>Atualize o produto desejado</h1>
    
    <form method="POST" action="atualizar.php">
        
    <div class="form-row">
    
    <div class="form-group col-sm-12">
            
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        
        <label for="inputNome">Nome</label>
        <input type="text" class="form-control" name = "nome" id="nome" placeholder="Nome do produto" value="<?php echo $Produto['nome'] ?>">
        
        <label for="inputValor">Valor</label>
        <input type="text" class="form-control" name = "valor" id="valor" placeholder="Valor produto" value="<?php echo $Produto['valorUnitario'] ?>">
        
        

        <?php 
        $comando2 ="select nome from categoria_produto";
        $resultado2 = mysqli_query($conexao2,$comando2);
        $categoria2 = mysqli_fetch_array($resultado2);

        ?>
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <?php 
            $comando ="select * from vwcp";
            $resultado = mysqli_query($conexao2,$comando);
            while ($categoria = mysqli_fetch_array($resultado)) {
                if ($Produto['idcategoria_produto'] == $categoria['nome']) {
                    $selecionado = "selected";
                } else {
                    $selecionado = "";
                }
            ?>
                <!--HTML-->
                <option value="<?=$categoria['idcategoria_produto'];?>" <?php echo $selecionado; ?>><?= $categoria['nome']; ?> </option>
            <?php
            }
            ?>
        </select>
        <input type="submit" class="btn btn-success" value="Atualizar">
        <a href="index.php" class="btn btn-primary" >Voltar ao menu</a>
        <input type="reset" class="btn btn-danger" value="Limpar Dados">
    
    </div>
        
    </div>
    
    </form>

    
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