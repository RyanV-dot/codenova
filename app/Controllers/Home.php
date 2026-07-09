<?php

namespace App\Controllers;

use App\Models\CandidatoModel;
use App\Models\EmpresaModel;
use App\Models\vagasModel;

class Home extends BaseController
{
    protected $session;

    public function __construct() {
        $this->session = \Config\Services::session();
    }

    public function logar()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('pswd');

        // 1. Verificação Especial do Perfil ADMIN
        if ($email === 'admin@empreganl.com' && $senha === 'sa234') {
            $this->session->set([
                'id_usuario'  => 0,
                'nome'        => 'Administrador Geral',
                'email'       => $email,
                'tipo_perfil' => 'admin',
                'logado'      => true
            ]);
            return redirect()->to(base_url('principal'));
        }

        // 2. Verificação de Candidato
        $candidatoM = new CandidatoModel();
        $candidato = $candidatoM->verificarLogin($email, $senha);
        if ($candidato) {
            $this->session->set([
                'id_usuario'  => $candidato['id'],
                'nome'        => $candidato['nome'],
                'email'       => $candidato['email'],
                'tipo_perfil' => 'candidato',
                'logado'      => true
            ]);
            return redirect()->to(base_url('principal'));
        }

        // 3. Verificação de Empresa
        $empresaM = new EmpresaModel();
        $empresa = $empresaM->verificarLogin($email, $senha);
        if ($empresa) {
            $this->session->set([
                'id_usuario'  => $empresa['id'],
                'nome'        => $empresa['nome'],
                'email'       => $empresa['email'],
                'tipo_perfil' => 'empresa',
                'logado'      => true
            ]);
            return redirect()->to(base_url('principal'));
        }

        // SE CHEGOU AQUI: E-mail ou Senha estão incorretos
        // Define o Flashdata com o erro e redireciona de volta para a tela de login
        $this->session->setFlashdata('erro_login', 'E-mail ou senha incorretos. Tente novamente.');
        return redirect()->back()->withInput();
    }

    public function vagas()
    {
        // Segurança: se não estiver logado, joga para o login
        if (!$this->session->get('logado')) {
            return redirect()->to(base_url('/'));
        }

        $vagasM = new vagasModel();
        $tipo_perfil = $this->session->get('tipo_perfil');
        
        $data['tipo_perfil'] = $tipo_perfil;
        $data['nome_usuario'] = $this->session->get('nome');

        // Busca dados de acordo com quem está logado
        if ($tipo_perfil === 'empresa') {
            $data['vagas'] = $vagasM->buscarVagasPorEmpresa($this->session->get('id_usuario'));
        } else {
            // Candidato ou Admin visualizam todas as vagas
            $data['vagas'] = $vagasM->buscarTodasVagas();
        }

        return view('principal', $data);
    }

    public function perfil()
    {
        if (!$this->session->get('logado')) return redirect()->to(base_url('/'));
        
        $tipo = $this->session->get('tipo_perfil');
        if ($tipo === 'admin') return redirect()->to(base_url('principal'));

        $id = $this->session->get('id_usuario');
        $data['tipo_perfil'] = $tipo;
        $data['nome_usuario'] = $this->session->get('nome');

        if ($tipo === 'candidato') {
            $model = new CandidatoModel();
            $data['usuario'] = $model->find($id);
        } else {
            $model = new EmpresaModel();
            $data['usuario'] = $model->find($id);
            
            $vagasM = new vagasModel();
            $data['vagas_empresa'] = $vagasM->where('id_empresa', $id)->paginate(4, 'vagas');
            $data['pager'] = $vagasM->pager;
        }

        return view('perfil', $data);
    }

    public function login(): string { return view('login'); }

    // Rotas Exclusivas do Administrador Geral
    public function candidatosAdmin()
    {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') !== 'admin') {
            return redirect()->to(base_url('/'));
        }
        $candM = new CandidatoModel();
        $data['tipo_perfil'] = 'admin';
        $data['nome_usuario'] = $this->session->get('nome');
        $data['lista'] = $candM->paginate(4, 'candidatos');
        $data['pager'] = $candM->pager;
        $data['secao'] = 'candidatos';

        return view('admin_listas', $data);
    }

    public function empresasAdmin()
    {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') !== 'admin') {
            return redirect()->to(base_url('/'));
        }
        $empM = new EmpresaModel();
        $vagasM = new vagasModel();
        
        $data['tipo_perfil'] = 'admin';
        $data['nome_usuario'] = $this->session->get('nome');
        
        $empresas = $empM->paginate(4, 'empresas');
        foreach ($empresas as &$emp) {
            $emp['vagas'] = $vagasM->where('id_empresa', $emp['id'])->findAll();
        }
        
        $data['lista'] = $empresas;
        $data['pager'] = $empM->pager;
        $data['secao'] = 'empresas';

        return view('admin_listas', $data);
    }

    public function criarVaga()
    {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') !== 'empresa') {
            return redirect()->to(base_url('/'));
        }
        $data['nome_usuario'] = $this->session->get('nome');
        $data['tipo_perfil'] = $this->session->get('tipo_perfil');
        return view('criar_vaga', $data);
    }

    public function salvarNovaVaga()
    {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') !== 'empresa') {
            return redirect()->to(base_url('/'));
        }
        $vagasM = new vagasModel();
        $vagasM->save([
            'nome'          => $this->request->getPost('nome'),
            'statts'        => $this->request->getPost('statts'),
            'data_iniciada' => date('Y-m-d'),
            'requisitos'    => $this->request->getPost('requisitos'),
            'salario'       => $this->request->getPost('salario'),
            'id_empresa'    => $this->session->get('id_usuario'),
            'tipo'          => $this->request->getPost('tipo')
        ]);
        return redirect()->to(base_url('principal'));
    }

    public function sair() {
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function escolhaLogin(): string { return view('escolha'); }
    public function criarconta(): string { return view('criarconta'); }
    public function criarcontaempresa(): string { return view('criarcontaempresa'); }
}