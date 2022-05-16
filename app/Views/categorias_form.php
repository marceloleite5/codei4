
<html>
<head>
    <title><?php echo $titulo ?></title>
</head>
<body>
    <h2><?php echo $titulo ?></h2>
    <p><a href="index">Voltar</a></p>
    <strong><?php echo $msg ?></strong>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo (isset($categoria) ? $categoria->id : '')?>" />
        <p>Nome da categoria: <input 
        type="text" 
        name="nomecategoria" 
        value="<?php echo (isset($categoria) ? $categoria->nomecategoria : '')?>" /></p>
        <p><input type="submit" value="<?php echo $acao ?>" /></p>
    </form>
</body>
</html>