<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EquipeController extends BaseController
{
    private $EquipeModel;
    private $FuncionarioModel;
    public function __construct()
    {
        $this->EquipeModel = new \App\Models\EquipeModel();
        $this->FuncionarioModel = new \App\Models\FuncionarioModel();
    }

    public function index()
    {
        return view("equipeView", [
            'equipes' => $this->EquipeModel->findAll(),
            'funcionarios' => $this->FuncionarioModel->findAll()
        ]);
    }

    public function delete($idequipe)
    {
        if ($this->EquipeModel->delete($idequipe)) {
            return view('message', [
                'message' => 'Equipe deletado com sucesso!'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao salvar equipe.');
        }
    }

    public function edit($idequipe)
    {
        return view('formEquipe', [
            'equipe' => $this->EquipeModel->find($idequipe),
        ]);
    }

    public function create()
    {
        return view('formEquipe');
    }

    public function store()
    {
        $postData = $this->request->getPost();

        if (empty($postData['nomeEquipe'])) {
            return redirect()->back()->with('erros', 'Por favor, preencha todos os campos obrigatórios.');
        }
        if ($this->EquipeModel->save($postData)) {
            return view('message', [
                'message' => 'Equipe salvo com sucesso!',
                'url' => '/equipes'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao salvar equipe.');

        }
    }
}
