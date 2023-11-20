<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FuncionarioController extends BaseController
{
    private $FuncionarioModel;
    public function __construct()
    {
        $this->FuncionarioModel = new \App\Models\FuncionarioModel();
    }

    public function index()
    {
        return view('funcionarioView', [
            'funcionarios' => $this->FuncionarioModel->findAll()
        ]);
    }

    public function delete($idfuncionario){
        if($this->FuncionarioModel->delete($idfuncionario)){
            return view('message', [
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!'
            ]);
        }
    }

    public function edit($idfuncionario){
        return view('formFuncionario', [
            'funcionario' => $this->FuncionarioModel->find($idfuncionario)
        ]);
    }

    public function create(){
        return view('formFuncionario');
    }
    
    public function store(){
        if($this->FuncionarioModel->save($this->request->getPost())){
            return view('message', [
                'message' => 'Usuário salvo com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar usuário!'
            ]);
        }
    }
}
