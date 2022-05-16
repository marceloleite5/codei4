<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use CodeIgniter\Config\View;

class Categorias extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: 
         $this->session = \Config\Services::session();
    }

    public function index()
    {
        //chamar uma view que exibe todas as categorias
        $categoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->find();
        $data['titulo'] = 'Listando todas as categorias';
        $data['msg'] = $this->session->getFlashdata('msg');
         
        echo view('categorias', $data);
        
    }


    public function inserir()
    {
        $data['titulo'] = 'Inserir nova categoria';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if($this->request->getMethod() === 'post'){
            $categoriaModel = new \App\Models\CategoriaModel();
            $categoriaModel->set('nomecategoria', $this->request->getPost('nomecategoria'));

            if($categoriaModel->insert()){
                //deu certo
                $data['msg'] = 'Categoria inserida com sucesso!';
            }else{
                //deu errado
                $data['msg'] = 'Erro ao inserir categoria!';
            }
        }

        echo view('categorias_form', $data);
    }

    public function editar($id){
        $data['titulo'] = 'Editar categoria'.$id;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $categoriaModel = new \App\Models\CategoriaModel();

        $categoria = $categoriaModel->find($id);

        if($this->request->getMethod() === 'post'){
            //quando o form for submetido
            $categoria->nomecategoria = $this->request->getPost('nomecategoria');
           
            if($categoriaModel->update($id, $categoria)){
                $data['msg'] = 'Categoria editada com sucesso';
            }else{
                $data['msg'] = 'Erro ao editar categoria';
            }
        }

        $data['categoria'] = $categoria;
        echo view('categorias_form', $data);
    }

    public function excluir($id = null){

        if(is_null($id)){
            //redirecionar a aplicação para o categoria/index
            //definir uma mensagem via session
            $this->session->setFlashdata('msg', 'Categoria não encontrada');

            return redirect()->to(base_url('categorias'));
        }

        $categoriaModel = new \App\Models\CategoriaModel();
        if($categoriaModel->delete($id)){
        //excluido com sucesso
        $this->session->setFlashdata('msg', 'Categoria exluida com sucesso');
        }else{
            $this->session->setFlashdata('msg', 'Erro ao excluir categoria');
        }
        return redirect()->to(base_url('categorias'));
        
    }
    
}