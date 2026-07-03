<?php

namespace App\Controllers;

class Perfil extends BaseController
{
    public function index()
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
}




