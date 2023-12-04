<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ClienteController extends BaseController
{
    private $clienteModel;
    private $VeiculoModel;
    public function __construct()
    {
        $this->clienteModel = new \App\Models\ClienteModel();
        $this->VeiculoModel = new \App\Models\VeiculoModel();
    }

    public function index()
    {
        return view('clienteView', [
            'clientes' => $this->clienteModel->findAll()
        ]);
    }

    public function delete($idCliente)
    {
        if ($this->clienteModel->delete($idCliente)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!',
                'url' => '/clientes'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!',
                'url' => '/clientes'
            ]);
        }
    }

    public function edit($idCliente)
    {
        return view('formCliente', [
            'cliente' => $this->clienteModel->find($idCliente)
        ]);
    }

    public function create()
    {
        return view('formCliente', );
    }

    public function store()
    {
        $postData = $this->request->getPost();

        if (empty($postData['nomeCliente']) || empty($postData['cpf']) || empty($postData['telefone']) || empty($postData['dataNascimento'])) {
            return view('message', [
                'message' => 'Por favor, preencha todos os campos obrigatórios.',
                'url' => '/clientes'
            ]);
        }

        if ($this->clienteModel->save($postData)) {
            return view('message', [
                'message' => 'Cliente salvo com sucesso!',
                'url' => '/clientes'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar cliente!',
                'url' => '/clientes'
            ]);
        }
    }

    public function veiculo($idCliente)
    {
        return view('veiculoView', [
            'veiculos' => $this->VeiculoModel->where('idCliente', $idCliente)->findAll(),
            'idCliente' => $idCliente
        ]);
    }

    public function deleteVeiculo($idVeiculo)
    {
        if ($this->VeiculoModel->delete($idVeiculo)) {
            return view('message', [
                'message' => 'Veículo deletado com sucesso!',
                'url' => '/clientes/' . $this->VeiculoModel->find($idVeiculo)['idCliente'] . '/veiculos',
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar veículo!'
            ]);
        }
    }

    public function editVeiculo($idVeiculo)
    {
        return view('formVeiculo', [
            'veiculo' => $this->VeiculoModel->find($idVeiculo)
        ]);
    }

    public function createVeiculo($idCliente)
    {
        return view('formVeiculo', [
            'idCliente' => $idCliente
        ]);
    }


    public function storeVeiculo()
    {
        $postData = $this->request->getPost();

        if (empty($postData['placa']) || empty($postData['modelo']) || empty($postData['ano']) || empty($postData['cor'])) {
            return view('message', [
                'message' => 'Por favor, preencha todos os campos obrigatórios.',
                'url' => '/clientes/' . $postData['idCliente'] . '/veiculos',
            ]);
        }

        if ($this->VeiculoModel->save($postData)) {
            return view('message', [
                'message' => 'Veículo salvo com sucesso!',
                'url' => '/clientes/' . $postData['idCliente'] . '/veiculos',
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar veículo!',
                'url' => '/clientes/' . $postData['idCliente'] . '/veiculos',
            ]);
        }
    }
}
