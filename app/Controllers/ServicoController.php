<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ServicoController extends BaseController
{
    private $ServicoModel;
    public function __construct()
    {
        $this->ServicoModel = new \App\Models\ServicoModel();
    }

    public function index()
    {
        return view("servicoView", [
            'servicos' => $this->ServicoModel->findAll()
        ]);
    }

    public function delete($idservico)
    {
        if ($this->ServicoModel->delete($idservico)) {
            return view("message", [
                'message' => 'Serviço deletado com sucesso!',
                'url' => '/servicos'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao deletar serviço.');
        }
    }

    public function edit($idservico)
    {
        return view("formServico", [
            'servico' => $this->ServicoModel->find($idservico)
        ]);
    }

    public function create()
    {
        return view("formServico");
    }

    public function store()
    {
        $postData = $this->request->getPost();
        if (empty($postData['nomeServico']) || empty($postData['valorServico']) || empty($postData['descricao'])) {
            return redirect()->back()->with('erros', 'Por favor, preencha todos os campos obrigatórios.');
        }
        if ($this->ServicoModel->save($postData)) {
            return view("message", [
                'message' => 'Serviço salvo com sucesso!',
                'url' => '/servicos'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao salvar serviço.');
        }
    }
}
