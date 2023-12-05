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

    public function delete($idPeca)
    {
        if ($this->PecaModel->delete($idPeca)) {
            return view('message', [
                'message' => 'Peça deletada com sucesso!',
                'url' => '/pecas'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao deletar peça.');
        }
    }

    public function edit($idPeca)
    {
        return view('formPeca', [
            'peca' => $this->PecaModel->find($idPeca)
        ]);
    }

    public function create()
    {
        return view('formPeca');
    }

    public function store()
    {
        $postData = $this->request->getPost();
        if (empty($postData['nomePeca']) || empty($postData['valorPeca']) || empty($postData['descricao'])) {
            return redirect()->back()->with('erros', 'Por favor, preencha todos os campos obrigatórios.');
        }
        if ($this->PecaModel->save($postData)) {
            return view('message', [
                'message' => 'Peça salva com sucesso!',
                'url' => '/pecas'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao salvar peça.');
        }
    }
}
