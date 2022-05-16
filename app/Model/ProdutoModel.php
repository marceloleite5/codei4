<?php namespace App\Models;


use CodeIgniter\Model;

class ProdutoModel extends Model {
    
    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomeproduto', 'valor', 'categoria_id'];
    protected $returnType = 'object';

    protected $validationRules = [
    'nomeproduto' => 'required|min_length[3]|is_unique[produto.nomeproduto]',
        'valor'   => 'required|numeric'
];
    protected $validationMessages = [
        'nomeproduto' => [
            'O campo nomeproduto é obrigatório',
        'min_length'  => 'O campo Nome do produto tem que ter mais de 3 caracteres.',
        'is_unique'   => 'Já existe um produto com o nome informado'
        ],
        'valor' => [
            'required' => 'O campo Valor é obrigatório'
        ]
    ];

}

