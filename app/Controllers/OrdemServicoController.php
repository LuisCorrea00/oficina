<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrdemServicoController extends BaseController
{
    private $OrdemServicoModel;

    public function __construct()
    {
        $this->OrdemServicoModel = new \App\Models\OrdemServicoModel();
    }

    public function index()
    {
        return view('ordemServicoView', [
            'ordensTodo' => $this->OrdemServicoModel->getToDo(null),
            'ordensDone' => $this->OrdemServicoModel->getDone(),
        ]);
    }

    public function create()
    {
        return view('formOrdemServico', [
            'clientes' => (new \App\Models\ClienteModel())->findAll(),
            'equipes' => (new \App\Models\EquipeModel())->findAll()
        ]);
    }

    public function store()
    {
        $postData = $this->request->getPost();
        if (empty($postData['idCliente']) || empty($postData['idEquipe']) || empty($postData['placa']) || empty($postData['descricaoProblema'])) {
            return view('message', [
                'message' => 'Por favor, preencha todos os campos obrigatórios.',
                'url' => '/ordemServico'
            ]);
        }

        if ($this->OrdemServicoModel->insertOS($postData)) {
            return view('message', [
                'message' => 'Ordem de serviço salva com sucesso!',
                'url' => '/ordemServico'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar ordem de serviço!',
                'url' => '/ordemServico'
            ]);
        }
    }

    public function delete($idOrdem_servico)
    {
        if ($this->OrdemServicoModel->delete($idOrdem_servico)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!',
                'url' => '/ordemServico'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!',
                'url' => '/ordemServico'
            ]);
        }
    }

    public function edit($idOrdem_servico)
    {
        return view('formOrdemServico', [
            'ordemServico' => $this->OrdemServicoModel->getToDo($idOrdem_servico)[0],
            'clientes' => (new \App\Models\ClienteModel())->findAll(),
            'equipes' => (new \App\Models\EquipeModel())->findAll()
        ]);
    }

    public function concluir($idOrdem_servico)
    {
        return view('concluirOrdemServico', [
            'ordemServico' => $this->OrdemServicoModel->getToDo($idOrdem_servico)[0],
            'servicos' => (new \App\Models\ServicoModel())->findAll(),
            'pecas' => (new \App\Models\PecaModel())->findAll(),
        ]);
    }

    public function concluirStore()
    {
        $form = $this->request->getPost();

        if (isset($form['idPeca']) && is_array($form['idPeca'])) {
            foreach ($form['idPeca'] as $index => $peca) {
                $this->OrdemServicoModel->insertPeca($form['idOrdem_servico'], $form['quantidadePeca'][$index], $peca);
            }
        }

        if (isset($form['idServico']) && is_array($form['idServico'])) {
            foreach ($form['idServico'] as $index => $servico) {
                $this->OrdemServicoModel->insertServico($form['idOrdem_servico'], $form['quantidadeServico'][$index], $servico);
            }
        }

        if ($this->OrdemServicoModel->insertDoneOS($form['idOrdem_servico'])) {
            return view('message', [
                'message' => 'Ordem de serviço concluída com sucesso!',
                'url' => '/ordemServico'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao concluir ordem de serviço!',
                'url' => '/ordemServico'
            ]);
        }
    }
}
