<?php
namespace App\Controllers;

use codenova\Models;

class Home extends BaseController
{
    public function index(): string
    {

        #return view('minha_primeira_pagina');
        return view('welcome_message');

    }

    public function login(): string
    {

        #return view('minha_primeira_pagina');
        return view('login');

    }

    public function perfil(): string
    {
        return view('perfil');
    }

    public function criarconta(): string
    {

        #return view('minha_primeira_pagina');
        return view('criarconta');

    }

    public function criarcontaempresa(): string
    {

        #return view('minha_primeira_pagina');
        return view('criarcontaempresa');

    }

}

?>