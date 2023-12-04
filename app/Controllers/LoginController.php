<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    private $LoginModel;
    public function __construct()
    {
        $this->LoginModel = new \App\Models\LoginModel();
    }

    public function index()
    {
        return view('loginView');
    }

    public function store()
    {
        $validate = $this->validate(
            [
                'username' => 'required',
                'senha' => 'required'
            ],
            [
                'username' => [
                    'required' => 'O campo usuário é obrigatório'
                ],
                'senha' => [
                    'required' => 'O campo senha é obrigatório'
                ]
            ]
        );

        if (!$validate) {
            return redirect()->back()->with('erros', $this->validator->getErrors());
        }

        $userFound = $this->LoginModel->where('username', $this->request->getPost('username'))->first();

        if (!$userFound) {
            return redirect()->back()->with('erros', ['username' => 'Usuário não encontrado']);
        }

        unset($userFound->senha);
        session()->set('user', $userFound);
        return redirect()->to('/');
    }

    public function logout()
    {
        $session = session();

        $session->destroy();

        return redirect()->to('/login');
    }
}
