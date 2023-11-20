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
            'equipes' => $this->EquipeModel->getEquipe(null),
            'titles' => $this->EquipeModel->findAll()
        ]);
    }

    public function delete($idequipe)
    {
        if ($this->EquipeModel->deleteEquipe($idequipe)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!'
            ]);
        }
    }

    public function edit($idequipe)
    {
        return view('formEquipe', [
            'equipe' => $this->EquipeModel->getEquipe($idequipe),
            'funcionarios' => $this->FuncionarioModel->findAll()
        ]);
    }
}
