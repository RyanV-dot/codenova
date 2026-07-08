<?php

namespace App\Controllers;

use App\Models\CandidatoModel;
use App\Models\EmpresaModel;
use App\Models\vagasModel;
use App\Models\InscricaoModel;

class Home extends BaseController
{
    protected $session;

    public function __construct() {
        // Inicializa a Session para controle de segurança em todas as páginas
        $this->session = \Config\Services::session();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function login(): string
    {
        return view('login');
    }

    // Processa a Autenticação dos 3 tipos de usuários
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

        $candidatoM = new CandidatoModel();
        $empresaM   = new EmpresaModel();

        // 2. Tenta autenticar na tabela Candidato
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

        // 3. Tenta autenticar na tabela Empresa
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

        // Se falhar em todos, retorna para a tela de login com mensagem de erro
        return redirect()->to(base_url('/'))->with('erro', 'Credenciais inválidas para acesso.');
    }

    // Tela Principal Protegida por Sessão
    public function vagas()
    {
        // Impede acessos diretos via URL (Se não passou pela autenticação, volta pro login)
        if (!$this->session->get('logado')) {
            return redirect()->to(base_url('/'));
        }

        $vagasM = new vagasModel();
        $inscricaoM = new InscricaoModel();
        
        $data['tipo_perfil'] = $this->session->get('tipo_perfil');
        $data['nome_usuario'] = $this->session->get('nome');
        $id_usuario = $this->session->get('id_usuario');

        if ($data['tipo_perfil'] == 'candidato') {
            // Candidato: lista tudo e checa o pivô para desativar botão onde já se inscreveu
            $vagas_disponiveis = $vagasM->buscarTodasVagas();
            foreach ($vagas_disponiveis as &$vaga) {
                $vaga['ja_inscrito'] = $inscricaoM->jaInscrito($id_usuario, $vaga['id']);
            }
            $data['vagas'] = $vagas_disponiveis;

        } elseif ($data['tipo_perfil'] == 'empresa') {
            // Empresa: lista apenas as dela e puxa do pivô os candidatos reais concorrendo
            $vagas_empresa = $vagasM->buscarVagasPorEmpresa($id_usuario);
            foreach ($vagas_empresa as &$vaga) {
                $vaga['candidatos'] = $inscricaoM->buscarCandidatosPorVaga($vaga['id']);
            }
            $data['vagas'] = $vagas_empresa;

        } elseif ($data['tipo_perfil'] == 'admin') {
            // Admin: Dados globais do sistema (pode listar tudo de tudo)
            $data['total_vagas'] = count($vagasM->findAll());
            $candidatoM = new CandidatoModel();
            $data['total_candidatos'] = count($candidatoM->findAll());
            $empresaM = new EmpresaModel();
            $data['total_empresas'] = count($empresaM->findAll());
        }

        return view('principal', $data);
    }

    // Grava a candidatura de forma assíncrona na tabela pivô
    public function candidatar($id_vaga)
    {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') != 'candidato') {
            return $this->response->setJSON(['sucesso' => false, 'mensagem' => 'Não autorizado']);
        }

        $inscricaoM = new InscricaoModel();
        $id_candidato = $this->session->get('id_usuario');

        if (!$inscricaoM->jaInscrito($id_candidato, $id_vaga)) {
            $inscricaoM->save([
                'id_candidato' => $id_candidato,
                'id_vagas'     => $id_vaga
            ]);
        }

        return $this->response->setJSON(['sucesso' => true]);
    }

    // Salva o formulário enviado por criarconta.php
    public function salvarCandidato() {
        $candidatoM = new CandidatoModel();
        $candidatoM->save([
            'nome'        => $this->request->getPost('nome'),
            'cpf'         => $this->request->getPost('cpf'),
            'telefone'    => $this->request->getPost('telefone'),
            'email'       => $this->request->getPost('email'),
            'senha'       => $this->request->getPost('senha'),
            'experiencia' => 'Nova conta',
            'data_nasc'   => '2000-01-01'
        ]);
        return redirect()->to(base_url('/'))->with('sucesso', 'Conta de Candidato criada com sucesso!');
    }

    // Salva o formulário enviado por criarcontaempresa.php
    public function salvarEmpresa() {
        $empresaM = new EmpresaModel();
        $empresaM->save([
            'nome'     => $this->request->getPost('nome'),
            'cnpj'     => $this->request->getPost('cnpj'),
            'telefone' => $this->request->getPost('telefone'),
            'email'    => $this->request->getPost('email'),
            'senha'    => $this->request->getPost('senha'),
        ]);
        return redirect()->to(base_url('/'))->with('sucesso', 'Conta de Empresa criada com sucesso!');
    }

    public function perfil()
    {
        if (!$this->session->get('logado')) { return redirect()->to(base_url('/')); }
        $data['usuario'] = [
            'nome' => $this->session->get('nome'),
            'email' => $this->session->get('email'),
            'telefone' => '(31) 98765-4321', 'nascimento' => '12/03/1998',
            'area' => 'TI', 'objetivo' => 'Desenvolvedor', 'experiencia' => '2 anos',
            'formacao' => 'Análise de Sistemas', 'habilidades' => 'PHP, SQL'
        ];
        return view('perfil', $data);
    }

    public function criarVaga() {
        if (!$this->session->get('logado') || $this->session->get('tipo_perfil') != 'empresa') {
            return redirect()->to(base_url('/'));
        }
        return view('criar_vaga');
    }

    public function salvarNovaVaga() {
        $vagasM = new vagasModel();
        $vagasM->save([
            'nome'          => $this->request->getPost('nome'),
            'statts'        => 'Aberta',
            'data_iniciada' => date('Y-m-d'),
            'requisitos'    => $this->request->getPost('requisitos'),
            'salario'       => $this->request->getPost('salario'),
            'id_empresa'    => $this->session->get('id_usuario'),
            'tipo'          => $this->request->getPost('tipo')
        ]);
        return redirect()->to(base_url('principal'));
    }

    public function sair()
    {
        // Encerra e limpa a sessão
        $this->session->destroy();
        return redirect()->to(base_url('/'));
    }

    public function escolhaLogin(): string { return view('escolha'); }
    public function criarconta(): string { return view('criarconta'); }
    public function criarcontaempresa(): string { return view('criarcontaempresa'); }
}