<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FuncionarioController extends BaseController
{
    private $FuncionarioModel;
    private $EquipeModel;
    public function __construct()
    {
        $this->FuncionarioModel = new \App\Models\FuncionarioModel();
        $this->EquipeModel = new \App\Models\EquipeModel();
    }

    public function index()
    {
        return view('funcionarioView', [
            'funcionarios' => $this->FuncionarioModel->findAll(),
            'equipes' => $this->EquipeModel->findAll()
        ]);
    }

    public function delete($idfuncionario)
    {
        if ($this->FuncionarioModel->delete($idfuncionario)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!',
                'url' => '/funcionarios'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!',
                'url' => '/funcionarios'
            ]);
        }
    }

    public function edit($idfuncionario)
    {
        return view('formFuncionario', [
            'funcionario' => $this->FuncionarioModel->find($idfuncionario),
            'equipes' => $this->EquipeModel->findAll(),
        ]);
    }

    public function create()
    {
        return view('formFuncionario', [
            'equipes' => $this->EquipeModel->findAll(),
        ]);
    }

    public function store()
    {
        $postData = $this->request->getPost();

        if (empty($postData['nomeFuncionario']) || empty($postData['cpf']) || empty($postData['telefone']) || empty($postData['dataNascimento']) || empty($postData['idEquipe'])) {
            return view('message', [
                'message' => 'Por favor, preencha todos os campos obrigatórios.',
                'url' => '/funcionarios'
            ]);
        }

        if ($this->FuncionarioModel->save($postData)) {
            return view('message', [
                'message' => 'Usuário salvo com sucesso!',
                'url' => '/funcionarios'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar usuário!',
                'url' => '/funcionarios'
            ]);
        }
    }
}
