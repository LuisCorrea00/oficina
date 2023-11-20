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

    public function delete($idcliente)
    {
        if ($this->clienteModel->delete($idcliente)) {
            return view('message', [
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar usuário!'
            ]);
        }
    }

    public function edit($idcliente)
    {
        return view('formCliente', [
            'cliente' => $this->clienteModel->find($idcliente)
        ]);
    }

    public function create()
    {
        return view('formCliente', );
    }

    public function store()
    {
        if ($this->clienteModel->save($this->request->getPost())) {
            return view('message', [
                'message' => 'Cliente salvo com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar cliente!'
            ]);
        }
    }

    public function veiculo($idcliente)
    {
        return view('veiculoView', [
            'veiculos' => $this->VeiculoModel->where('cliente_idcliente', $idcliente)->findAll(),
            'idcliente' => $idcliente
        ]);
    }

    public function deleteVeiculo($idveiculo)
    {
        if ($this->VeiculoModel->delete($idveiculo)) {
            return view('message', [
                'message' => 'Veículo deletado com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao deletar veículo!'
            ]);
        }
    }

    public function editVeiculo($idveiculo)
    {
        return view('formVeiculo', [
            'veiculo' => $this->VeiculoModel->find($idveiculo)
        ]);
    }

    public function createVeiculo($idcliente)
    {
        return view('formVeiculo', [
            'idcliente' => $idcliente
        ]);
    }


    public function storeVeiculo()
    {
        if ($this->VeiculoModel->save($this->request->getPost())) {
            return view('message', [
                'message' => 'Veículo salvo com sucesso!'
            ]);
        } else {
            return view('message', [
                'message' => 'Erro ao salvar veículo!'
            ]);
        }
    }
}
