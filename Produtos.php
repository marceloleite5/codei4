<?php

namespace App\Controllers;

class Produtos extends BaseController
{
    public function index()
    {
        $produtoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $produtoModel->find();
        $data['titulo'] = 'Listando todos os produtos';
        //$data['msg'] = $this->session->getFlashdata('msg');

        //chamar uma view que exibe todas as categorias
        $categoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->find();
       
         
        echo view('produtos', $data);
    }

    public function inserir()
    {
        $data['titulo'] = 'Inserir novo produto';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';

        if($this->request->getMethod() === 'post'){
            $produtoModel = new \App\Models\ProdutoModel();
            $dadosProduto = $this->request->getPost();
            
            if($produtoModel->insert($dadosProduto)){
               $data['msg'] = 'Produto inserido com sucesso'; 
            }else{
                $data['msg'] = 'Erro ao inserir produto';
                $data['erros'] = $produtoModel->errors();
            }
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategorias = $categoriaModel->findAll();
        helper('form');
        $arrayCategorias = [];
        foreach($listaCategorias as $categoria){
            $arrayCategorias[$categoria->id] = $categoria->nomecategoria;
        }
        $data['comboCategorias'] = form_dropdown('categoria_id', $arrayCategorias);
        echo view('produtos_form', $data);
    }

    

}