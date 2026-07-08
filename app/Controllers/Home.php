<?php
namespace App\Controllers;

use App\Models\vagasModel;

class Home extends BaseController
{
    public function index(): string
    {

        return view('welcome_message');

    }

    public function login(): string
    {
        return view('login');

    }

    public function perfil()
    {
        $data['usuario'] = [
            'nome' => 'João da Silva',
            'email' => 'joao.silva@email.com.br',
            'telefone' => '(31) 98765-4321',
            'nascimento' => '12/03/1998',
            'area' => 'Tecnologia da Informação',
            'objetivo' => 'Atuar como desenvolvedor web full stack',
            'experiencia' => '2 anos como dev frontend em agência de marketing',
            'formacao' => 'Análise de Sistemas - IFMG (2022)',
            'habilidades' => 'React, Node.js, SQL, Git, Inglês intermediário'
        ];

        return view('perfil', $data);
    }

    public function criarconta(): string
    {
        return view('criarconta');
    }

    public function criarcontaempresa(): string
    {
        return view('criarcontaempresa');

    }


    public function vagas()
    {
        $vagas = new vagasModel();
        $dados['vagas'] = $vagas->buscarVagas();

        return view('principal', $dados);
    }

    public function escolhaLogin()
    {
        return view('escolha');
    }

}

?>