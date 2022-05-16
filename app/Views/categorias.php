
<html>
<head>
    <title><?php echo $titulo ?></title>
    <style>
        .titulo{
            font-style: italic;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;

        }
        .tabela, .tabela td, .tabela tr{
            border: 1px solid;
            border-color: green;
            border-radius: 8px 0px 0px 0px;
        }
        .tabela{
            background-color: green;
            width: 40%;
            
        }
        .tabela td{
            background-color: #ccc;
            border-radius: 8px 0px 0px 8px;
            font-size: 16px;
            text-align: center;
        }
        .cab {
            background-color: #ccc;
        }
        
    </style>
</head>
<body><div class="cab">
    <h2 class="titulo"><?php echo $titulo ?></h2>
    <p><?php echo $msg ?></p>
    
    <p><a href="<?php echo base_url('categorias/inserir') ?>">+ Inserir categorias </a></p>
    <p><a href="<?php echo base_url('produtos') ?>">Produtos </a></p>
   </div>
    <table class="tabela" align="center">
        <tr>
            <td>Código da Categoria</td>
            <td>Nome da Categoria</td>
            <td></td>
            <td></td>
        </tr>

        <?php  foreach($categorias as $categoria) : ?>
            <tr>
                <td><?php echo $categoria->id ?></td>
                <td><?php  echo $categoria->nomecategoria ?></td>
                <td><a href="<?php echo base_url('categorias/editar/'. $categoria->id) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('categorias/excluir/'. $categoria->id) ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
    </table>
</body>
