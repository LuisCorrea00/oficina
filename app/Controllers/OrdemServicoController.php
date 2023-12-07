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
            'veiculos' => (new \App\Models\VeiculoModel())->findAll(),
            'equipes' => (new \App\Models\EquipeModel())->findAll()
        ]);
    }

    public function store()
    {
        $postData = $this->request->getPost();
        if (empty($postData['idVeiculo']) || empty($postData['idEquipe']) || empty($postData['descricaoProblema'])) {
            return redirect()->back()->with('erros', 'Por favor, preencha todos os campos obrigatórios.');
        }

        if ($this->OrdemServicoModel->insertOS($postData)) {
            return view('message', [
                'message' => 'Ordem de serviço salva com sucesso!',
                'url' => '/ordemServico'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao salvar ordem de serviço.');
        }
    }

    public function delete($idOrdem_servico)
    {
        if ($this->OrdemServicoModel->delete($idOrdem_servico)) {
            return view('message', [
                'message' => 'Ordem de serviço deletada com sucesso!',
                'url' => '/ordemServico'
            ]);
        } else {
            return redirect()->back()->with('erros', 'Erro ao deletar ordem de serviço.');
        }
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
        $validate = $this->validate(
            [
                'idPeca.*' => 'required',
                'idServico.*' => 'required',
                'quantidadePeca.*' => 'required',
                'quantidadeServico.*' => 'required',
            ],
        );

        if ($validate) {

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
            }

        } else {
            return redirect()->back()->with('erros', 'Selecione pelo menos um serviço, uma peça e suas respectivas quantidades.');
        }

        return redirect()->back()->with('erros', 'Erro ao concluir ordem de serviço.');
    }
}
