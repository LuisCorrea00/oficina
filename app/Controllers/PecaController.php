<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PecaController extends BaseController
{
    private $PecaModel;
    public function __construct()
    {
        $this->PecaModel = new \App\Models\PecaModel();
    }

    public function index()
    {
        return view('pecaView', [
            'pecas' => $this->PecaModel->findAll()
        ]);
    }

    public function delete($idpeca)
    {
        if ($this->PecaModel->delete($idpeca)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!'
            ]);
        }
    }

    public function edit($idpeca)
    {
        return view('formPeca', [
            'peca' => $this->PecaModel->find($idpeca)
        ]);
    }

    public function create()
    {
        return view('formPeca');
    }

    public function store()
    {
        if ($this->PecaModel->save($this->request->getPost())) {
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
