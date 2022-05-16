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
    
    
    <p><a href="<?php echo base_url('produtos/inserir') ?>">+ Inserir produtos </a></p>
    <p><a href="<?php echo base_url('categorias') ?>">Categorias</a></p>
   </div>
    <table class="tabela" align="center">
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Valor:</td>
            <td>categoria</td>
            <td></td>
            <td></td>
        </tr>

        <?php  foreach($produtos as $produto) : ?>
            <tr>
                <td><?php echo $produto->id ?></td>
                <td><?php  echo $produto->nomeproduto ?></td>
                <td>R$ <?php  echo $produto->valor ?>,00</td>
                <td> <?php  echo $produto->categoria_id ?></td>
                <td><a href="<?php echo base_url('produtos/editar/'. $produto->id) ?>">Editar</a></td>
                <td><a href="<?php echo base_url('produtos/excluir/'. $produto->id) ?>">Excluir</a></td>
            </tr>
            <?php endforeach ?>
    </table>
</body>
